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
        $bahagian = DB::table('bahagian')->where('id', $id)->firstOrFail();

        return view('bahagian.template-edit', compact('bahagian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required'
        ]);

        DB::table('bahagian')->where('id', $id)->update($data);

        return redirect()->route('bahagian.index')->with('success', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('bahagian')->where('id', $id)->delete();

        return redirect()->route('bahagian.index')->with('success', 'Rekod berjaya dipadam');
    }
}
