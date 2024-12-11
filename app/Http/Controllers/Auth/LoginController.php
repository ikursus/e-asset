<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function borangLogin()
    {

        // Panggil template daripada resources/views/auth/template-login.php
        return view('auth.template-login');

    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        // Semak data yang dikirimkan
        // Log in kan user JIKA data adalah betul
        if (Auth::attempt($data)) {

            $request->session()->regenerate();

            // Redirect user ke dashboard JIKA berjaya login
            return redirect()->intended('dashboard')->with('success', 'Selamat Datang ' . Auth::user()->name);
        }

        // Jika gagal login, maka redirect ke halaman login semula
        return redirect()->back()->withErrors([
            'email' => 'Maklumat login tidak tepat'
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        // Logout User
        Auth::logout();

        // Invalidkan session lama
        $request->session()->invalidate();

        // Regenerate session baru
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
