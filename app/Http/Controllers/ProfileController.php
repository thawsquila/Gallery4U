<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Handle avatar upload if provided
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $dir = public_path('images/avatars');
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            $filename = 'avatar_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);

            // Delete old avatar if exists
            if (!empty($user->avatar)) {
                $oldPath = public_path('images/avatars/' . $user->avatar);
                if (file_exists($oldPath)) @unlink($oldPath);
            }

            $validated['avatar'] = $filename;
        }

        $user->update($validated);
        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success_password', 'Password berhasil diganti.');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'confirm_password' => ['required'],
        ]);

        $user = Auth::user();
        if (!Hash::check($request->confirm_password, $user->password)) {
            return back()->withErrors(['confirm_password' => 'Konfirmasi password tidak sesuai.']);
        }

        // Delete avatar file if exists
        if (!empty($user->avatar)) {
            $oldPath = public_path('images/avatars/' . $user->avatar);
            if (file_exists($oldPath)) @unlink($oldPath);
        }

        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('guest.home')->with('success', 'Akun berhasil dihapus.');
    }
}
