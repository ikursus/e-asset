<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenggunaController;

// Format routing Route::get(uri, action);

Route::get('/', [HomeController::class, 'homepage']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/dashboard', DashboardController::class);

// Routing untuk memaparkan borang login (method GET)
Route::get('/login', [LoginController::class, 'borangLogin']);
// Routing untuk menerima data daripada borang login (method POST)
Route::post('/login', [LoginController::class, 'authenticate']);

/*
 * Halaman pengguna
 */

// // Halaman untuk paparan senarai pengguna
// Route::get('/pengguna', [PenggunaController::class, 'index']);
// // Halaman untuk paparan borang tambah pengguna
// Route::get('/pengguna/baru', [PenggunaController::class, 'create']);
// // Dapatkan data pengguna baru dan simpan di dalam database
// Route::post('/pengguna', [PenggunaController::class, 'store']);
// // Dapatkan detail pengguna berdasarkan ID
// Route::get('/pengguna/{id}', [PenggunaController::class, 'show']);
// // Paparkan borang kemaskini pengguna berdasarkan ID
// Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit']);
// // Dapatkan data kemaskini pengguna berdasarkan ID dan update ke database
// Route::patch('/pengguna/{id}', [PenggunaController::class, 'update']);
// // Hapuskan pengguna berdasarkan ID
// Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy']);

Route::resource('pengguna', PenggunaController::class);
