<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {

    // Best practice nama template
    // 1. Semua huruf kecil
    // 2. tidak boleh ada space
    // 3. Jika lebih daripada 1 perkataan, gunakan kebab-case
    return view('template-homepage');
});

// Routing untuk memaparkan borang login (method GET)
Route::get('/login', function() {

    // Panggil template daripada resources/views/auth/template-login.php
    return view('auth.template-login');

});
// Routing untuk menerima data daripada borang login (method POST)
Route::post('/login', function() {
    // return 'Data telah diterima';
    return redirect('/dashboard');
});

/*
 * Halaman pengguna
 */

 Route::get('/dashboard', function() {

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

 });

 // Halaman untuk paparan senarai pengguna
 Route::get('/pengguna', function() {

    $html = '<h1>Senarai pengguna</h1>';
    $html .= '<a href="/pengguna/baru">Tambah pengguna</a>';

    return $html;

 });

// Halaman untuk paparan borang tambah pengguna
Route::get('/pengguna/baru', function() {

$html = '<h1>Tambah pengguna</h1>';
$html .= '<form action="/pengguna" method="POST">';
$html .= csrf_field();
$html .= '<label for="username">Username</label>';
$html .= '<input type="text" name="username" id="username">';
$html .= '<label for="password">Password</label>';
$html .= '<input type="password" name="password" id="password">';
$html .= '<input type="submit" value="Tambah pengguna">';
$html .= '</form>';
$html .= '<a href="/pengguna">Senarai pengguna</a>';

return $html;

});

Route::post('/pengguna', function() {
return 'Pengguna telah berjaya ditambah';
});


// Dapatkan detail pengguna berdasarkan ID
Route::get('/pengguna/{id}', function ($id) {
    return 'Detail pengguna: ' . $id;
});

Route::get('/groups/{group_id}/user/{user_id?}', function ($group_id, $user_id = NULL) {

    if (is_null($user_id)) {
        return 'Sila bekalkan ID pengguna';
    }

    return 'Group ID: ' . $group_id . ', User ID: ' . $user_id;

})->where([
    'group_id' => '[a-zA-Z0-9]+'
]);
