<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class CivitasController extends Controller
{
    // 1. UNTUK HALAMAN DEPAN (Preview)
    public function index()
    {
        // Ambil semua dosen
        $dosens = Dosen::where('kategori', 'dosen')->get();
        
        // PENTING: Ambil 1 Admin untuk variabel $admin
        $admin = Dosen::where('kategori', 'admin')->first(); 
        
        // Ambil 3 Teknisi saja untuk grid
        $teknisis = Dosen::where('kategori', 'teknisi')->limit(3)->get();

        // PENTING: Masukkan 'admin' ke dalam compact
        return view('civitas', compact('dosens', 'admin', 'teknisis'));
    }

    // 2. UNTUK HALAMAN SELENGKAPNYA
    public function lengkap()
    {
        $dosens = Dosen::where('kategori', 'dosen')->get();
        $admins = Dosen::where('kategori', 'admin')->get();
        $teknisis = Dosen::where('kategori', 'teknisi')->get();

        return view('civitas-lengkap', compact('dosens', 'admins', 'teknisis'));
    }
}