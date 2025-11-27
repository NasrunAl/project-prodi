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
        Schema::table('fasilitas', function (Blueprint $table) {
            if (! Schema::hasColumn('fasilitas', 'ikon_fa')) {
                $table->string('ikon_fa')->nullable()->after('deskripsi');
            }
            if (! Schema::hasColumn('fasilitas', 'gambar')) {
                $table->string('gambar')->nullable()->after('ikon_fa');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            if (Schema::hasColumn('fasilitas', 'gambar')) {
                $table->dropColumn('gambar');
            }
            if (Schema::hasColumn('fasilitas', 'ikon_fa')) {
                $table->dropColumn('ikon_fa');
            }
        });
    }
};
