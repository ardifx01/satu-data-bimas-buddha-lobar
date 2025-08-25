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
        Schema::create('data_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('file_path');
            $table->string('status');
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
        Schema::table('data_proposals', function (Blueprint $table) {
            $table->dropForeign(['vihara_id']);
            $table->dropColumn('vihara_id');
        });
    }
};