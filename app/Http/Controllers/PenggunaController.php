<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bahagian;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $senaraiPengguna = User::orderBy('id', 'desc')->get();
        // $senaraiPengguna = User::latest()->get();
        // $senaraiPengguna = User::all();
        $senaraiPengguna = User::latest()->get();

        return view('pengguna.template-senarai', compact('senaraiPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $senaraiBahagian = Bahagian::all();

        return view('pengguna.template-create', compact('senaraiBahagian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required', // cara validation menerusi string
            'email' => 'required|email',
            'no_kp' => ['required', 'numeric', 'digits:12'],
            'no_kakitangan' => ['required', 'string'],
            'phone' => ['required'], // cara validation menerusi array
            'bahagian_id' => ['required', 'integer'],
            'status' => ['required', 'in:aktif,tidak_aktif'],
        ]);

        // Cara 1 Simpan Data Menggunakan Model = new Object
        // $user = new User();
        // $user->name = $data['name']; // $request->input('name');
        // $user->email = $data['email']; // $request->input('email');
        // $user->no_kp = $data['no_kp']; // $request->no_kp;
        // $user->password = bcrypt('pass123');
        // $user->no_kakitangan = $data['no_kakitangan']; // $request->no_kakitangan;
        // $user->phone = $data['phone'];
        // $user->bahagian_id = $data['bahagian_id'];
        // $user->status = $data['status'];
        // $user->save();

        // Cara 2 Simpan Data Menggunakan Model = method create()
        $data['password'] = bcrypt('pass123');
        User::create($data);

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
