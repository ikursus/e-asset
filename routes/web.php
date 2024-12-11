<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BahagianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;

// Format routing Route::get(uri, action);

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Routing untuk memaparkan borang login (method GET)
Route::get('/login', [LoginController::class, 'borangLogin'])->name('login');
// Routing untuk menerima data daripada borang login (method POST)
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');

/*
 * Halaman pengguna
 */

// // Halaman untuk paparan senarai pengguna
// Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
// // Halaman untuk paparan borang tambah pengguna
// Route::get('/pengguna/baru', [PenggunaController::class, 'create'])->name('pengguna.create');
// // Dapatkan data pengguna baru dan simpan di dalam database
// Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
// // Dapatkan detail pengguna berdasarkan ID
// Route::get('/pengguna/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
// // Paparkan borang kemaskini pengguna berdasarkan ID
// Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');
// // Dapatkan data kemaskini pengguna berdasarkan ID dan update ke database
// Route::patch('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
// // Hapuskan pengguna berdasarkan ID
// Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('pengguna', PenggunaController::class);
    Route::resource('asset', AssetController::class);
    Route::resource('bahagian', BahagianController::class);

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Route untuk logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});
