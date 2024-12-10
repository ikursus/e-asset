<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homepage()
    {
        return view('template-homepage');
    }

    public function contact()
    {
        return 'Ini halaman contact us';
    }
}
