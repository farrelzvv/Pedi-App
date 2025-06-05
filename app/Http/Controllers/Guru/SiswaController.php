<?php

namespace App\Http\Controllers\Guru; // Pastikan namespace sudah benar

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Kita akan menggunakan model User untuk mengambil data
use Illuminate\View\View;

class SiswaController extends Controller
{
    /**
     * Menampilkan daftar semua siswa (pengguna dengan role murid).
     */
    public function index(): View
    {
        // Ambil semua pengguna yang memiliki role = 1 (Murid)
        // Ingat, 0: Guru, 1: Murid
        $daftarSiswa = User::where('role', 1)->orderBy('name')->get(); // atau ->paginate(10) untuk pagination

        // Kirim data siswa ke view
        return view('guru.siswa.index', [
            'students' => $daftarSiswa,
        ]);
        // Ini berarti view akan berada di resources/views/guru/siswa/index.blade.php
    }
}
