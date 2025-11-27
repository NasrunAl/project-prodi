<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $beritasTerkini = Berita::latest()->limit(4)->get();

        return view('home', compact('beritasTerkini'));
    }
}