<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserOtp;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // pastikan ada file resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            \Log::info('User logged in', ['user_id' => $user->id, 'role' => $user->role, 'email' => $user->email]);

            // /login is reserved for admin. Non-admins are redirected to user login.
            if ($user->role !== 'admin') {
                \Log::warning('Non-admin attempted to log in via admin login page', ['user_id' => $user->id]);
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('user.login')->with('error', 'Gunakan halaman login pengguna untuk akun non-admin.');
            }

            // Admin goes to dashboard
            \Log::info('Redirecting admin to dashboard');
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Verifikasi captcha wajib diisi.'
        ]);

        if (!$this->verifyRecaptcha($request->input('g-recaptcha-response'))) {
            return back()->withErrors(['g-recaptcha-response' => 'Verifikasi captcha gagal. Coba lagi.'])->withInput();
        }

        // Create admin directly (tanpa OTP)
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($user);
        return redirect()->route('admin.dashboard')->with('success', 'Akun admin berhasil dibuat.');
    }

    public function showVerifyOtpForm()
    {
        if (!session('email')) {
            return redirect()->route('register')->with('error', 'Please register first.');
        }
        
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required|string|size:6',
        ]);

        $otp = UserOtp::where('email', $request->email)
                     ->where('otp_code', $request->otp_code)
                     ->first();

        if (!$otp || !$otp->isValid()) {
            return back()->with('error', 'Invalid or expired OTP code.');
        }

        // Get registration data from session
        $registrationData = session('registration_data');
        if (!$registrationData) {
            return redirect()->route('register')->with('error', 'Registration session expired. Please register again.');
        }

        // Create user account with role from session
        $user = User::create([
            'name' => $registrationData['name'],
            'email' => $registrationData['email'],
            'password' => $registrationData['password'],
            'role' => $registrationData['role'] ?? 'admin', // Default to admin for backward compatibility
        ]);

        // Mark OTP as verified
        $otp->verify();

        // Clear session data
        session()->forget(['registration_data', 'email']);

        // Login user and redirect based on role
        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Admin account created and verified successfully!');
        } else {
            return redirect()->route('guest.home')->with('success', 'Akun berhasil dibuat dan diverifikasi. Selamat datang!');
        }
    }

    public function resendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $otp = UserOtp::generateOtp($request->email);
        $this->sendOtpEmail($request->email, $otp->otp_code);

        return response()->json(['success' => true, 'message' => 'New OTP sent successfully']);
    }

    private function sendOtpEmail($email, $otpCode)
    {
        Mail::raw("Your verification code is: {$otpCode}\n\nThis code will expire in 10 minutes.\n\nSMK Negeri 4 Bogor", function($message) use ($email) {
            $message->to($email)
                   ->subject('Email Verification - SMK Negeri 4 Bogor');
        });
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $email = $request->input('email');

        // Ensure user exists
        $user = User::where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.']);
        }

        // Generate OTP using existing mechanism
        $otp = UserOtp::generateOtp($email);
        // Send OTP email with reset wording
        Mail::raw("Kode reset kata sandi Anda: {$otp->otp_code}\n\nKode berlaku 10 menit.\n\nGallery4U", function($message) use ($email) {
            $message->to($email)->subject('Kode Reset Kata Sandi - Gallery4U');
        });

        // Save email in session for next step
        session(['reset_email' => $email]);

        return redirect()->route('password.code.form')->with('status', 'Kami telah mengirim kode ke email Anda. Masukkan kode untuk melanjutkan.');
    }

    public function showResetPasswordForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token, 'request' => $request]);
    }

    // Show form to enter OTP code for password reset
    public function showForgotPasswordCodeForm(Request $request)
    {
        $email = session('reset_email');
        return view('auth.forgot-password-code', ['email' => $email]);
    }

    // Verify OTP code, then create broker token and redirect to reset form
    public function verifyForgotPasswordCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required|string|size:6',
        ]);

        $otp = UserOtp::where('email', $request->email)
                      ->where('otp_code', $request->otp_code)
                      ->first();

        if (!$otp || !$otp->isValid()) {
            return back()->withErrors(['otp_code' => 'Kode tidak valid atau sudah kedaluwarsa.'])->withInput();
        }

        // Mark OTP as used
        $otp->verify();

        $user = User::where('email', $request->email)->firstOrFail();
        // Create password broker token
        $token = Password::createToken($user);

        // Clear session marker
        session()->forget('reset_email');

        // Redirect to standard reset form with token and email
        return redirect()->route('password.reset', ['token' => $token, 'email' => $user->email]);
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

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('guest.home');
    }

    // User Authentication Methods
    public function showUserLoginForm()
    {
        return view('auth.user-login');
    }

    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // If a redirect path was provided and is a safe relative path, honor it
            $redirect = $request->input('redirect');
            if ($redirect && \Illuminate\Support\Str::startsWith($redirect, '/')) {
                return redirect($redirect);
            }

            // Redirect based on role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect('/'); // redirect to guest/home
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showUserRegisterForm()
    {
        return view('auth.user-register');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
            'g-recaptcha-response' => 'required',
        ], [
            'g-recaptcha-response.required' => 'Verifikasi captcha wajib diisi.'
        ]);

        if (!$this->verifyRecaptcha($request->input('g-recaptcha-response'))) {
            return back()->withErrors(['g-recaptcha-response' => 'Verifikasi captcha gagal. Coba lagi.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect('/')->with('success', 'Pendaftaran berhasil. Selamat datang!');
    }

    private function verifyRecaptcha(?string $token): bool
    {
        if (!$token) return false;
        $secret = env('RECAPTCHA_SECRET');
        if (!$secret) return false;
        try {
            $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.
                urlencode($secret).'&response='.urlencode($token));
            $json = json_decode($response, true);
            return isset($json['success']) && $json['success'] === true;
        } catch (\Throwable $e) {
            \Log::error('reCAPTCHA verification failed', ['error' => $e->getMessage()]);
            return false;
        }
    }
}
