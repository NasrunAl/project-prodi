<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Untuk membuat slug/excerpt

class BeritaController extends Controller
{
    // 1. TAMPILKAN DAFTAR BERITA
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    // 2. TAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('admin.berita.create');
    }

    // 3. SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'required|string|max:100',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000', // Max 5MB
        ]);

        // Upload Gambar
        $gambarPath = $request->file('gambar')->store('berita-images', 'public');

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    // 4. TAMPILKAN FORM EDIT
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // 5. PROSES UPDATE
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        // Cek jika ada upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $gambarPath = $request->file('gambar')->store('berita-images', 'public');
        } else {
            $gambarPath = $berita->gambar;
        }

        // Update data
        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    // 6. HAPUS DATA
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus gambar fisik
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus!');
    }
}