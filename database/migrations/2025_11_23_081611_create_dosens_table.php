<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_dosens_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable(); // Bisa null untuk Admin/Teknisi jika tidak ada
            $table->string('jabatan'); // Contoh: "Lektor Kepala", "Teknisi", "Administrasi"
            $table->enum('kategori', ['dosen', 'admin', 'teknisi']); // PENTING: Untuk memisahkan di frontend
            $table->string('foto')->nullable(); // Path gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosens');
    }
};