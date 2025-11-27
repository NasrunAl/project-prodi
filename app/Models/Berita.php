<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Nama tabel spesifik untuk model ini
    protected $table = 'beritas';

    // $fillable untuk mengizinkan mass assignment hanya pada kolom yang aman
    protected $fillable = [
        'judul',
        'slug',      // kalau ada
        'konten',    // atau 'isi'
        'gambar',    // path file
        'excerpt',   // ringkasan / optional
        'user_id',   // penulis, jika ada
        'penulis',
        // tambahkan kolom lain yang akan diisi lewat mass-assignment
    ];
}
