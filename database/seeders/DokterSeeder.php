<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokters = [
            ['nama' => 'Dr. Andi Saputra', 'spesialis' => 'Penyakit Dalam', 'rating' => 4.5],
            ['nama' => 'Dr. Siti Nurhaliza', 'spesialis' => 'Anak', 'rating' => 4.7],
            ['nama' => 'Dr. Budi Prasetyo', 'spesialis' => 'Bedah Umum', 'rating' => 4.3],
            ['nama' => 'Dr. Rina Amelia', 'spesialis' => 'Kandungan', 'rating' => 4.8],
            ['nama' => 'Dr. Deni Wicaksono', 'spesialis' => 'THT', 'rating' => 4.2],
        ];

        foreach ($dokters as $dokter) {
            Dokter::create($dokter);
        }
    }
}
