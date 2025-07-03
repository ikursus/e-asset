<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bahagian;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiPengguna = User::with('bahagian')->latest()->get();
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'no_kp' => ['required', 'numeric', 'digits:12'],
            'no_kakitangan' => ['required', 'string'],
            'phone' => ['required'],
            'bahagian_id' => ['required', 'integer'],
            'status' => ['required', 'in:aktif,tidak_aktif'],
            'gambar' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploaded/images'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        $data['password'] = bcrypt('pass123');
        $user = User::create($data);

        // Assign default role
        $user->assignRole('user');

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berjaya ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengguna = User::with('bahagian')->findOrFail($id);
        return view('pengguna.template-show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengguna = User::findOrFail($id);
        $senaraiBahagian = Bahagian::all();
        return view('pengguna.template-edit', compact('pengguna', 'senaraiBahagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'no_kp' => ['required', 'numeric', 'digits:12'],
            'no_kakitangan' => ['required', 'string'],
            'phone' => ['required'],
            'bahagian_id' => ['required', 'integer'],
            'status' => ['required', 'in:aktif,tidak_aktif'],
            'gambar' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048']
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploaded/images'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        $pengguna = User::findOrFail($id);
        $pengguna->update($data);

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = User::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Pengguna berjaya dihapus');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'senarai-pengguna.xlsx');
    }

    public function pdf()
    {
        $senaraiPengguna = User::with('bahagian')->get();
        $pdf = Pdf::loadView('pengguna.template-pdf', compact('senaraiPengguna'));
        return $pdf->download('senarai-pengguna.pdf');
    }
}
