<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/akademik', function () {
    return view('akademik');
});

Route::get('/fasilitas', function () {
    // Anda bisa buat file fasilitas.blade.php dengan struktur serupa
    return view('fasilitas'); // Placeholder
});

Route::get('/civitas', function () {
    // Anda bisa buat file civitas.blade.php dengan struktur serupa
    return view('civitas'); // Placeholder
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/civitas/lengkap', function () {
    return view('civitas-lengkap');
});