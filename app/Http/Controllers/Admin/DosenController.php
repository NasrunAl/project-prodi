<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    // 1. TAMPILKAN DAFTAR DOSEN (READ)
    public function index()
    {
        // Mengambil semua data dosen, diurutkan dari yang terbaru
        $dosens = Dosen::latest()->get();
        return view('admin.dosen.index', compact('dosens'));
    }

    // 2. TAMPILKAN FORM TAMBAH (CREATE)
    public function create()
    {
        return view('admin.dosen.create');
    }

    // 3. SIMPAN DATA KE DATABASE (STORE)
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'required|string|max:100',
            'kategori' => 'required|in:koordinator,dosen,admin,teknisi',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        // Upload Foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            // Simpan file di folder 'storage/app/public/dosen-images'
            $fotoPath = $request->file('foto')->store('dosen-images', 'public');
        }

        // Simpan ke Database
        Dosen::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // 4. TAMPILKAN FORM EDIT (EDIT)
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    // 5. PROSES UPDATE DATA (UPDATE)
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        // Validasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'nullable|string|max:50',
            'jabatan' => 'required|string|max:100',
            'kategori' => 'required|in:dosen,admin,teknisi',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Cek jika ada upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('dosen-images', 'public');
        } else {
            // Pertahankan foto lama jika tidak ada upload baru
            $fotoPath = $dosen->foto;
        }

        // Update Data
        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Data berhasil diperbarui!');
    }

    // 6. HAPUS DATA (DESTROY)
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        
        // Hapus foto fisik jika ada
        if ($dosen->foto) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $dosen->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}