<?php

namespace App\Http\Controllers; // <-- INI ADALAH NAMESPACE YANG BENAR

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Menampilkan semua fasilitas di halaman publik.
     */
    public function index()
    {
        // Ambil semua data fasilitas yang telah ditambahkan oleh admin
        $fasilitas = Fasilitas::all(); 
        
        return view('fasilitas', compact('fasilitas'));
    }
}