<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BahagianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query ke table bahagian menerusi Query Builder
        // Ambil semua data daripada table bahagian
        // Sorting latest id berada di atas, dan yang lama berada di belakang/bawah
        $senaraiBahagian = DB::table('bahagian')->orderBy('id', 'desc')->get();

        return view('bahagian.template-senarai', compact('senaraiBahagian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bahagian.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required'
        ]);

        DB::table('bahagian')->insert($data);

        return redirect()->route('bahagian.index')->with('success', 'Rekod berjaya ditambah');
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
        // Cari data bahagian berdasarkan ID
        $bahagian = DB::table('bahagian')->where('id', '=', $id)->firstOrFail();

        return view('bahagian.template-edit', compact('bahagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input field nama wajib diisi
        $data = $request->validate([
            'nama' => 'required'
        ]);

        // Cari data bahagian berdasarkan ID dan update data
        DB::table('bahagian')->where('id', '=', $id)->update($data);

        // Bagi respon dengan redirect ke senarai bahagian beserta mesej success
        return redirect()->route('bahagian.index')->with('success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Cari data bahagian berdasarkan ID dan delete data
        DB::table('bahagian')->where('id', $id)->delete();

        // Bagi respon dengan redirect ke senarai bahagian beserta mesej success
        return redirect()->route('bahagian.index')->with('success', 'Rekod berjaya dipadam');
    }
}
