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
        Schema::table('viona_reservasis', function (Blueprint $table) {
            $table->dropForeign(['pasien_id']);
            $table->dropColumn('pasien_id');
            $table->string('nama_pasien');
        });
    }

    public function down(): void
    {
        Schema::table('viona_reservasis', function (Blueprint $table) {
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
            $table->dropColumn('nama_pasien');
        });
    }

};
