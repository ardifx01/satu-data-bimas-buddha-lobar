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
        Schema::create('program_bantuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vihara_id')->constrained('data_viharas')->onDelete('cascade');
            $table->string('nama_program');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak'])->default('diajukan');
            $table->date('tanggal_pengajuan')->nullable();
            $table->date('tanggal_pencairan')->nullable();
            $table->decimal('jumlah_bantuan', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_bantuans');
    }
};