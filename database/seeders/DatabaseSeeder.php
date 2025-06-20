<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cek apakah user biasa sudah ada
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Cek apakah admin sudah ada
        if (!User::where('email', 'admin@rs.com')->exists()) {
            User::create([
                'name' => 'Admin RS',
                'email' => 'admin@rs.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ]);
        }

        // Jalankan seeder tambahan
        $this->call([
            DokterSeeder::class,
        ]);
    }
}
