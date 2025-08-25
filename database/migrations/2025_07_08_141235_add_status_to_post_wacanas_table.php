<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('post_wacanas', function (Blueprint $table) {
            $table->string('status')->default('draft')->after('tanggal_terbit');
        });
    }

    public function down()
    {
        Schema::table('post_wacanas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};