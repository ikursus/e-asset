<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function borangLogin() {

        // Panggil template daripada resources/views/auth/template-login.php
        return view('auth.template-login');

    }

    public function authenticate() {
        // return 'Data telah diterima';
        return redirect('/dashboard');
    }
}
