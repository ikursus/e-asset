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
            'email' => 'required|email|unique:users,email',
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
        $pengguna = User::find($id);
        // $pengguna = User::findOrFail($id);
        // $pengguna = User::where('id', $id)->firstOrFail();
        // $pengguna = User::where('id', $id)->first();
        // $pengguna = User::where('status', 'aktif')->where('id', $id)->firstOrFail();

        if (! $pengguna) {
            // return 'Tiada pengguna menerusi ID: '. $id;
            return redirect()->route('pengguna.index')->with('error', 'Tiada pengguna menerusi ID: '. $id);
        }

        $senaraiBahagian = Bahagian::all();

        return view('pengguna.template-edit', compact('pengguna', 'senaraiBahagian'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required', // cara validation menerusi string
            'email' => 'required|email|unique:users,email,' . $id,
            'no_kp' => ['required', 'numeric', 'digits:12'],
            'no_kakitangan' => ['required', 'string'],
            'phone' => ['required'], // cara validation menerusi array
            'bahagian_id' => ['required', 'integer'],
            'status' => ['required', 'in:aktif,tidak_aktif'],
        ]);

        if ($request->hasFile('gambar')) {

            $request->validate([
                'gambar' => ['mimes:jpg,jpeg,png', 'max:2048'],
            ]);

            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploaded/images'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        $pengguna = User::findOrFail($id);
        $pengguna->update($data);

        return redirect()->route('pengguna.index')->with('success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna = User::findOrFail($id);

        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Rekod berjaya dihapus');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function pdf()
    {
        $senaraiPengguna = User::all();

        $pdf = Pdf::loadView('pengguna.template-pdf', compact('senaraiPengguna') );
        return $pdf->download('invoice.pdf');
    }
}
