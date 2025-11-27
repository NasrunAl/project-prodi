<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * READ: Menampilkan daftar semua fasilitas.
     */
    public function index()
    {
        // Ambil data fasilitas terbaru dengan paginasi
        $fasilitas = Fasilitas::latest()->paginate(10);
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    /**
     * CREATE: Menampilkan form untuk membuat fasilitas baru.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * STORE: Menyimpan fasilitas baru ke database dan mengelola upload gambar.
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'ikon_fa' => 'nullable|string|max:50',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
        ]);

        $imagePath = null;
        
        // 2. Upload Gambar
        if ($request->hasFile('gambar')) {
            // Simpan gambar di folder storage/app/public/fasilitas
            $imagePath = $request->file('gambar')->store('fasilitas', 'public');
        }

        // 3. Simpan Data ke Database
        Fasilitas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ikon_fa' => $request->ikon_fa,
            'gambar' => $imagePath, // Simpan path gambar
        ]);

        return redirect()->route('admin.fasilitas.index')
                         ->with('success', 'Fasilitas **' . $request->nama . '** berhasil ditambahkan.');
    }

    /**
     * EDIT: Menampilkan form untuk mengedit fasilitas tertentu.
     */
    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * UPDATE: Memperbarui fasilitas tertentu dan mengelola perubahan gambar.
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        // 1. Validasi Data
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'ikon_fa' => 'nullable|string|max:50',
            // Gambar tidak wajib diisi saat update, tapi jika diisi harus valid
            'gambar' => 'image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);
        
        $imagePath = $fasilitas->gambar;

        // 2. Handle Upload Gambar Baru
        if ($request->hasFile('gambar')) {
            
            // Hapus gambar lama jika ada
            if ($fasilitas->gambar) {
                Storage::disk('public')->delete($fasilitas->gambar);
            }
            
            // Simpan gambar baru
            $imagePath = $request->file('gambar')->store('fasilitas', 'public');
        }

        // 3. Update Data ke Database
        $fasilitas->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'ikon_fa' => $request->ikon_fa,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('admin.fasilitas.index')
                         ->with('success', 'Fasilitas **' . $request->nama . '** berhasil diperbarui.');
    }

    /**
     * DELETE: Menghapus fasilitas dari database dan file gambar terkait.
     */
    public function destroy(Fasilitas $fasilitas)
    {
        // 1. Hapus File Gambar dari Storage
        if ($fasilitas->gambar) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }
        
        $nama = $fasilitas->nama;
        
        // 2. Hapus Data dari Database
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index')
                         ->with('success', 'Fasilitas **' . $nama . '** berhasil dihapus.');
    }
}