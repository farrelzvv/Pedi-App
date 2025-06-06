<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Panggil seeder spesifik Anda di sini
        $this->call([
            GuruSeeder::class,
            // Anda bisa tambahkan seeder lain di sini nanti
            // Contoh: MateriSeeder::class,
        ]);
    }
}
