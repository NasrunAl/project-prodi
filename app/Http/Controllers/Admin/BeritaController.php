<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi disesuaikan dengan name="isi" dan name="penulis" di Form
        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string', // UBAH INI: dari 'konten' jadi 'isi'
            'penulis' => 'required|string|max:100', // TAMBAH INI
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'excerpt' => 'nullable|string|max:500',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita-images', 'public');
        }

        Berita::create([
            'judul'   => $request->judul,
            'slug'    => \Illuminate\Support\Str::slug($request->judul), // Otomatis buat slug dari judul
            'konten'  => $request->isi, // PENTING: Ambil dari $request->isi, simpan ke kolom konten
            'penulis' => $request->penulis, // Simpan penulis
            'gambar'  => $gambarPath,
            'excerpt' => $request->excerpt,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'   => 'required|string|max:255',
            'isi'     => 'required|string', // Sesuaikan
            'penulis' => 'required|string|max:100', // Sesuaikan
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'excerpt' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('berita-images', 'public');
        } else {
            $gambarPath = $berita->gambar;
        }

        $berita->update([
            'judul'   => $request->judul,
            'slug'    => \Illuminate\Support\Str::slug($request->judul),
            'konten'  => $request->isi, // Sesuaikan
            'penulis' => $request->penulis, // Sesuaikan
            'gambar'  => $gambarPath,
            'excerpt' => $request->excerpt,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }
}