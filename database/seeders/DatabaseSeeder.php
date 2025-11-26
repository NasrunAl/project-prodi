<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // PENTING: Import ini!

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Akun Admin untuk Login Dashboard
        User::create([
            'name' => 'Admin Prodi',
            'email' => 'admin@polije.ac.id', // Email untuk login
            'password' => Hash::make('password'), // PENTING: Password 'password' di-hash
        ]);

        // 2. Panggil Seeder Dosen/Civitas yang sudah dibuat sebelumnya
        $this->call([
            DosenSeeder::class,
        ]);
    }
}