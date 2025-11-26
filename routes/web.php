<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController; // PENTING: Untuk halaman Home
use App\Http\Controllers\CivitasController;
// Import Controller Admin di sini
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\BeritaController; // PENTING: Untuk CRUD Berita

// ================== HALAMAN PUBLIK ================== //

// ROUTE UTAMA HOME (Mengambil data Berita)
Route::get('/', [HomeController::class, 'index']); 

Route::get('/akademik', function () {
    return view('akademik');
});

Route::get('/fasilitas', function () {
    return view('fasilitas');
});

// Halaman Civitas Publik
Route::get('/civitas', [CivitasController::class, 'index'])->name('civitas');
Route::get('/civitas/lengkap', [CivitasController::class, 'lengkap'])->name('civitas.lengkap');


// ================== AUTH (LOGIN/LOGOUT) ================== //

// Tampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Proses logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================== ADMIN (HANYA SETELAH LOGIN) ================== //
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    
    // Redirect /admin ke dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Dosen
    Route::resource('dosen', DosenController::class);

    // CRUD Berita (BARU)
    Route::resource('berita', BeritaController::class); 
});