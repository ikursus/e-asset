<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('pengguna.template-profile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Rekod telah dikemaskini');
    }

}
