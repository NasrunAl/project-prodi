<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilLulusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilLulusanController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan kolom 'urutan' agar admin bisa mengatur posisi
        $profils = ProfilLulusan::orderBy('urutan', 'asc')->get();
        return view('admin.profil_lulusan.index', compact('profils'));
    }

    public function create()
    {
        return view('admin.profil_lulusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ikon'      => 'nullable|image|max:2048', // Foto Background
            'urutan'    => 'required|integer',
        ]);

        $path = null;
        if ($request->hasFile('ikon')) {
            $path = $request->file('ikon')->store('profil-images', 'public');
        }

        ProfilLulusan::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'ikon'      => $path,
            'urutan'    => $request->urutan,
        ]);

        return redirect()->route('admin.profil-lulusan.index')->with('success', 'Profil lulusan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $profil = ProfilLulusan::findOrFail($id);
        return view('admin.profil_lulusan.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $profil = ProfilLulusan::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'ikon'      => 'nullable|image|max:2048',
            'urutan'    => 'required|integer',
        ]);

        $path = $profil->ikon;
        if ($request->hasFile('ikon')) {
            if ($path && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('ikon')->store('profil-images', 'public');
        }

        $profil->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
            'ikon'      => $path,
            'urutan'    => $request->urutan,
        ]);

        return redirect()->route('admin.profil-lulusan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $profil = ProfilLulusan::findOrFail($id);
        if ($profil->ikon && Storage::disk('public')->exists($profil->ikon)) {
            Storage::disk('public')->delete($profil->ikon);
        }
        $profil->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}