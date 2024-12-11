<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $senaraiAsset = DB::table('assets')->orderBy('nama', 'asc')->get();

        return view('asset.template-senarai', compact('senaraiAsset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asset.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kuantiti' => 'required|numeric',
            'status' => 'required'
        ]);

        DB::table('assets')->insert($data);

        return redirect()->route('asset.index')->with('success', 'Rekod berjaya ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Dapatkan data asset berdasarkan ID
        $asset = DB::table('assets')->where('id', '=', $id)->firstOrFail();

        return view('asset.template-edit', compact('asset'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required',
            'kuantiti' => 'required|numeric',
            'status' => 'required'
        ]);

        DB::table('assets')->where('id', '=', $id)->update($data);

        return redirect()->route('asset.index')->with('success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('assets')->where('id', '=', $id)->delete();

        return redirect()->route('asset.index')->with('success', 'Rekod berjaya dihapus');
    }
}
