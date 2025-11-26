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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique();
        $table->string('ringkasan')->nullable(); // dipakai di card "BSD Terkini"
        $table->text('isi')->nullable();         // kalau nanti mau detail page
        $table->string('gambar')->nullable();
        $table->boolean('is_published')->default(true);
        $table->boolean('is_highlight')->default(true); // tampil di home/BSD Terkini
        $table->timestamp('published_at')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
