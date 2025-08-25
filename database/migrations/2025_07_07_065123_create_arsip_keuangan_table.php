<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('arsip_keuangan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('nomor_arsip')->unique();
            $table->string('kategori'); // Misalnya: 'SPP', 'Operasional', dll
            $table->date('tanggal');
            $table->string('file_path'); // Path file di penyimpanan
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsip_keuangan');
    }
};