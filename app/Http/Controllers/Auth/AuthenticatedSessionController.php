<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role === 'super_admin' || $user->role === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }

        if ($user->role === 'wali_santri') {
            return redirect()->intended(route('portal.dashboard'));
        }

        // jika role tidak dikenali
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Akun Anda tidak memiliki hak akses yang valid.',
        ]);
    }
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}