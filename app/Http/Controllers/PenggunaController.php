<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengguna.template-senarai');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required', // cara validation menerusi string
            'email' => 'required|email',
            'no_kp' => ['required', 'numeric', 'digits:12'],
            'no_kakitangan' => ['required', 'string'],
            'telefon' => ['required'], // cara validation menerusi array
            'bahagian' => ['required', 'string'],
            'status' => ['required', 'in:aktif,tidak_aktif'],
        ]);

        return redirect()->route('pengguna.index')->with('success', 'Rekod telah disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'Detail pengguna: ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
