<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CivitasController;
use App\Http\Controllers\FasilitasController; // <-- CONTROLLER PUBLIK FASILITAS

// Import Controller Admin di sini
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\FasilitasController as AdminFasilitasController; // admin controller aliased to avoid name clash with public controller

// ROUTE UTAMA HOME
Route::get('/', [HomeController::class, 'index']); 

Route::get('/akademik', function () {
    $profils = \App\Models\ProfilLulusan::orderBy('urutan', 'asc')->get();
    return view('akademik', compact('profils'));
});

// ROUTE FASILITAS PUBLIK (DINAMIS DENGAN CONTROLLER)
Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');

// Halaman Berita Publik
Route::get('/berita', function () {
    $beritas = \App\Models\Berita::latest()->paginate(10); 
    return view('berita.index', compact('beritas'));
})->name('berita.index');

// Halaman Civitas Publik
Route::get('/civitas', [CivitasController::class, 'index'])->name('civitas');

// ================== AUTH (LOGIN/LOGOUT) ================== //

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ================== ADMIN (HANYA SETELAH LOGIN) ================== //
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Resource
    Route::resource('dosen', DosenController::class);
    Route::resource('berita', BeritaController::class);
    Route::resource('profil-lulusan', \App\Http\Controllers\Admin\ProfilLulusanController::class);

    // CRUD Fasilitas (admin)
    Route::resource('fasilitas', AdminFasilitasController::class)->except(['show']);
});