<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama Fasilitas (ex: Lab Bisnis Digital)
            $table->text('deskripsi')->nullable(); // Deskripsi singkat
            $table->string('ikon_fa')->nullable(); // Class Font Awesome (ex: fas fa-desktop)
            $table->string('gambar'); // Path file gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
