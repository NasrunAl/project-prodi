<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilLulusan extends Model
{
    use HasFactory;

    protected $table = 'profil_lulusans';

    // Kita gunakan kolom 'ikon' untuk menyimpan Foto/Gambar background card
    protected $fillable = [
        'judul',
        'deskripsi',
        'ikon', // Ini nanti kita pakai untuk upload gambar
        'urutan'
    ];
}