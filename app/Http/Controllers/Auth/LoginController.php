<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function borangLogin()
    {

        // Panggil template daripada resources/views/auth/template-login.php
        return view('auth.template-login');

    }

    public function authenticate(Request $request)
    {
        // return $request->all();
        // return $request->except('_token');
        // return $request->input('email'); // $request->email
        // return $request->only('email', 'password');
        return redirect()->route('dashboard')->with('success', 'Selamat Datang');
    }

    public function logout()
    {
        // Logout User
        return redirect()->route('login');
    }
}
