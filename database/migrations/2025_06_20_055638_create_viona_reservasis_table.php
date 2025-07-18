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
        Schema::create('viona_reservasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokter_id')->constrained('viona_dokters')->onDelete('cascade');
            // $table->foreignId('pasien_id')->constrained('viona_pasiens')->onDelete('cascade');
            $table->foreignId('pasien_id')->constrained('users')->onDelete('cascade');
            $table->date('tanggal_kunjungan');
            $table->text('keluhan')->nullable();
            $table->enum('status', ['pending', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viona_reservasis');
    }
};

