<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        DB::statement("ALTER TABLE viona_pasiens MODIFY jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
