<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import Hash untuk enkripsi password

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan updateOrCreate untuk menghindari duplikasi jika seeder dijalankan berkali-kali
        User::updateOrCreate(
            // Kriteria untuk mencari user (berdasarkan email)
            ['email' => 'guru@pediapp.com'],
            // Data yang akan di-create atau di-update
            [
                'name' => 'Guru',
                'password' => Hash::make('password'), // Ganti 'password' dengan password yang Anda inginkan
                'role' => 0, // 0 adalah role untuk Guru
                'email_verified_at' => now(), // Otomatis verifikasi email agar bisa langsung login
            ]
        );
    }
}
