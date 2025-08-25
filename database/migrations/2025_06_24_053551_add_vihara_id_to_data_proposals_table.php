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
        Schema::table('data_proposals', function (Blueprint $table) {
            $table->foreignId('vihara_id')
            ->nullable()
            ->constrained('data_viharas')
            ->onDelete('set null');
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