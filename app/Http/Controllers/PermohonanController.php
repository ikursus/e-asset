<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permohonan.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tujuan' => 'required',
            'tempat_digunakan' => 'required',
        ]);

        // Dapatkan ID pemohonan berdasarkan authenticated ID
        $data['pemohon_id'] = auth()->id();
        $data['status'] = 'draft';

        $permohonan = Permohonan::create($data);

        // Redirect pemohonan ke halaman detail permohonan
        // untuk memilih asset yang ingin dipinjam
        return redirect()->route('permohonan.show', $permohonan->id)->with('success', 'Permohonan berjaya dibuat. Sila pilih asset yang ingin dimohon.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permohonan $permohonan)
    {
        // Dapatkan senarai asset yang boleh dipinjam
        $senaraiAsset = Asset::where('status', '=', 'available')->get();

        return view('permohonan.template-assets', compact('permohonan', 'senaraiAsset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permohonan $permohonan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permohonan $permohonan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permohonan $permohonan)
    {
        //
    }
}
