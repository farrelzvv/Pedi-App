<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Guru Contoh',
            'email' => 'guru@contoh.com', // Ganti dengan email yang unik
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'role' => 0, // Role Guru
            'email_verified_at' => now(), // Opsional, agar terverifikasi
        ]);
    }
}
