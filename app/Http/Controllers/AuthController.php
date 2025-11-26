<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // TAMPILKAN FORM LOGIN
    public function showLoginForm()
    {
        // view-nya: resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba login (cek ke tabel users)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // setelah login, arahkan ke dashboard admin
            return redirect()->intended(route('admin.dashboard'));
        }

        // Kalau gagal
        return back()->withErrors([
            'email' => 'Email atau password tidak sesuai.',
        ])->onlyInput('email');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // balik ke halaman utama
    }
}
