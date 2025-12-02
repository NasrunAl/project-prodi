<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    /**
     * Menampilkan halaman utama yang berisi daftar semua data civitas (dosen, admin, teknisi).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil semua data dari model Dosen, diurutkan dari yang terbaru dibuat.
        $dosens = Dosen::latest()->get();
        return view('admin.dosen.index', compact('dosens'));
    }

    /**
     * Menampilkan form untuk menambahkan data civitas baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.dosen.create');
    }

    /**
     * Menyimpan data civitas baru yang dikirim dari form 'create' ke dalam database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

        // Proses upload foto jika pengguna mengunggah file.
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            // Simpan file di 'storage/app/public/dosen-images' dan dapatkan path-nya.
            $fotoPath = $request->file('foto')->store('dosen-images', 'public');
        }

        // Buat record baru di tabel 'dosens' menggunakan data dari request.
        Dosen::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $fotoPath,
        ]);

        // Arahkan kembali ke halaman index dengan pesan sukses.
        return redirect()->route('admin.dosen.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit data civitas yang sudah ada.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Memperbarui data civitas di database berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
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

        // Cek jika ada file foto baru yang diunggah.
        if ($request->hasFile('foto')) {
            // Hapus foto lama dari storage untuk menghemat ruang.
            if ($dosen->foto && Storage::disk('public')->exists($dosen->foto)) {
                Storage::disk('public')->delete($dosen->foto);
            }
            // Simpan foto baru dan perbarui path-nya.
            $fotoPath = $request->file('foto')->store('dosen-images', 'public');
        } else {
            // Jika tidak ada foto baru, gunakan path foto yang lama.
            $fotoPath = $dosen->foto;
        }

        // Perbarui record di database.
        $dosen->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus data civitas dari database dan file foto terkait dari storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        
        // Hapus file foto dari storage sebelum menghapus record database.
        if ($dosen->foto) {
            Storage::disk('public')->delete($dosen->foto);
        }

        $dosen->delete(); // Hapus record dari tabel.
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}