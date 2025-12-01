<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Fasilitas;
use App\Models\ProfilLulusan;
use App\Models\Berita;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung data untuk kartu statistik
        $dosenCount          = Dosen::count();
        $koordinatorCount    = Dosen::where('kategori', 'koordinator')->count();
        $fasilitasCount      = Fasilitas::count();
        $profilLulusanCount  = ProfilLulusan::count();
        $beritaCount         = Berita::count();

        // Ambil data terbaru untuk tabel
        $beritaTerbaru = Berita::orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        $dosenTerbaru  = Dosen::orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact(
            'dosenCount',
            'koordinatorCount',
            'fasilitasCount',
            'profilLulusanCount',
            'beritaCount',
            'beritaTerbaru',
            'dosenTerbaru'
        ));
    }
}
