<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 4 berita terbaru untuk slider BSD Terkini
        $beritasTerkini = Berita::latest()->limit(4)->get(); 
        
        return view('home', compact('beritasTerkini'));
    }
}