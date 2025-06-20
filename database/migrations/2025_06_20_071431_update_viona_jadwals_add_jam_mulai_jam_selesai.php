<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('viona_jadwals', function (Blueprint $table) {
            // Tambah kolom baru
            $table->time('jam_mulai')->after('hari');
            $table->time('jam_selesai')->after('jam_mulai');

            // Hapus kolom jam lama (jika sudah tidak digunakan)
            $table->dropColumn('jam');
        });
    }

    public function down(): void
    {
        Schema::table('viona_jadwals', function (Blueprint $table) {
            // Rollback: kembalikan kolom jam, hapus jam_mulai dan jam_selesai
            $table->string('jam');
            $table->dropColumn(['jam_mulai', 'jam_selesai']);
        });
    }
};
