<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar')->nullable(); // Path gambar headline
            $table->string('penulis')->nullable();
            $table->timestamps(); // created_at (Tanggal dibuat) & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};