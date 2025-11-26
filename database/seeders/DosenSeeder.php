<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    public function run()
    {
        // 1. Data Dosen
        Dosen::create(['nama' => 'Lukman Hakim, S.KOM., M.KOM', 'nip' => '198909112024211001', 'jabatan' => 'PJ Kampus', 'kategori' => 'dosen', 'foto' => 'dosen1.jpg']);
        Dosen::create(['nama' => 'Rizky Aditya Nugraha, S.A.B., M.M', 'nip' => '199105292024061003', 'jabatan' => 'Lektor Kepala', 'kategori' => 'dosen', 'foto' => 'dosen2.jpg']);
        Dosen::create(['nama' => 'Mas\'ud Hermansyah, S.KOM., M.KOM', 'nip' => '00000000000000', 'jabatan' => 'Pengajar', 'kategori' => 'dosen', 'foto' => 'dosen3.jpg']);
        
        // 2. Data Admin
        Dosen::create(['nama' => 'Ahmad Marzuq, S.Sos', 'nip' => '199202272022031007', 'jabatan' => 'Administrasi', 'kategori' => 'admin', 'foto' => 'admin.jpg']);

        // 3. Data Teknisi
        Dosen::create(['nama' => 'Istik Lailiyah, S.Kom', 'nip' => '198803010101708201', 'jabatan' => 'Teknisi', 'kategori' => 'teknisi', 'foto' => 'teknisi1.jpg']);
        Dosen::create(['nama' => 'Arif Indar H, A.Md', 'nip' => '1988032720190101', 'jabatan' => 'Teknisi', 'kategori' => 'teknisi', 'foto' => 'teknisi2.jpg']);
        Dosen::create(['nama' => 'M Syafiq, A.Md', 'nip' => '19880122201709101', 'jabatan' => 'Teknisi', 'kategori' => 'teknisi', 'foto' => 'teknisi3.jpg']);
    }
}