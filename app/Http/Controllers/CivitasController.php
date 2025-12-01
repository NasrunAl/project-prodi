<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class CivitasController extends Controller
{
    // 1. UNTUK HALAMAN DEPAN (Preview)
    public function index()
    {
        // Ambil Koordinator Program Studi
        $koordinators = Dosen::where('kategori', 'koordinator')->get();
        // Ambil semua dosen
        $dosens = Dosen::where('kategori', 'dosen')->get();
        // Ambil semua admin
        $admins = Dosen::where('kategori', 'admin')->get();
        // Ambil semua teknisi
        $teknisis = Dosen::where('kategori', 'teknisi')->get();

        return view('civitas', compact('koordinators', 'dosens', 'admins', 'teknisis'));
    }
}