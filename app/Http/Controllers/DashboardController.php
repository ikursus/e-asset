<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pageTitle = 'Dashboard';

        $senaraiAsset = [
            ['id' => 1, 'nama' => 'Projector', 'kuantiti' => 3],
            ['id' => 2, 'nama' => 'Laptop', 'kuantiti' => 4],
            ['id' => 3, 'nama' => 'Monitor', 'kuantiti' => 2],
            ['id' => 4, 'nama' => 'Printer', 'kuantiti' => 5],
            ['id' => 5, 'nama' => 'Scanner', 'kuantiti' => 1]
        ];

        // Cara 1 Attach data (variable) kepada template - menggunakan with()
        // return view('template-dashboard')->with('pageTitle', $pageTitle)->with('senaraiAsset', $senaraiAsset);

        // Cara 2 Attach data (variable) kepada template - menggunakan array()
        // return view('template-dashboard', ['pageTitle' => $pageTitle, 'senaraiAsset' => $senaraiAsset]);

        // Cara 3 Attach data (variable) kepada template - menggunakan compact()
        return view('template-dashboard', compact('pageTitle', 'senaraiAsset'));
    }
}
