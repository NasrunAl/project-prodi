<?php
// app/Models/Dosen.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'kategori', // 'dosen', 'admin', 'teknisi'
        'foto',
    ];
}