<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Models\UserOtp;

class ApiController extends Controller
{
    /**
     * Login user and create token
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Revoke previous tokens if needed
        // $user->tokens()->delete();

        $token = $user->createToken('api-token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
            'message' => 'Login successful'
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    
    /**
     * Register a new user and create token
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        $token = $user->createToken('api-token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
            'message' => 'Registration successful'
        ], 201);
    }

    /**
     * Change password for authenticated user (Sanctum)
     *
     * Request body:
     * - current_password: string (required)
     * - new_password: string (required, min:8, confirmed -> needs new_password_confirmation)
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        /** @var \App\Models\User $user */
        $user = $request->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'message' => 'Current password is incorrect.'
            ], 422);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'message' => 'Password updated successfully.'
        ]);
    }

    public function passwordForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Email tidak terdaftar.'
            ], 422);
        }

        $otp = UserOtp::generateOtp($email);

        Mail::raw(
            "Kode reset kata sandi Anda: {$otp->otp_code}\n\nKode berlaku 10 menit.\n\nGallery4U",
            function ($message) use ($email) {
                $message->to($email)->subject('Kode Reset Kata Sandi - Gallery4U');
            }
        );

        return response()->json([
            'message' => 'Kami telah mengirim kode ke email Anda.'
        ]);
    }

    public function verifyPasswordOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required|string|size:6',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $otp = UserOtp::where('email', $request->email)
            ->where('otp_code', $request->otp_code)
            ->first();

        if (!$otp || !$otp->isValid()) {
            return response()->json([
                'message' => 'Kode tidak valid atau sudah kedaluwarsa.'
            ], 422);
        }

        // Mark OTP as used
        $otp->verify();

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'message' => 'Email tidak terdaftar.'
            ], 422);
        }

        $user->password = Hash::make($request->password);
        $user->save();
        event(new PasswordReset($user));

        // Optionally cleanup OTPs for this email
        // UserOtp::where('email', $request->email)->delete();

        return response()->json([
            'message' => 'Kata sandi berhasil diperbarui.'
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'message' => __($status)
            ]);
        }

        return response()->json([
            'message' => __($status)
        ], 422);
    }
}