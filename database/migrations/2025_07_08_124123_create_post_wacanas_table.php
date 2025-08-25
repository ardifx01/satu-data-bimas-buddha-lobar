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
        Schema::create('post_wacanas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->foreignId('kategori_id')->constrained('kategori_wacanas')->cascadeOnDelete();
            $table->text('deskripsi')->nullable();
            $table->text('konten');
            $table->string('audio')->nullable();
            $table->string('video')->nullable();
            $table->string('gambar')->nullable();
            $table->date('tanggal_terbit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_wacanas');
    }
};