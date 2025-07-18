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
        Schema::create('viona_jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id')
            ->constrained('viona_dokters') // tulis nama tabel eksplisit
            ->onDelete('cascade');
            $table->string('hari');
            $table->string('jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viona_jadwals');
    }
};
