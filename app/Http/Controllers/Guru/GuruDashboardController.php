<?php

namespace App\Http\Controllers\Guru; // Pastikan namespace sudah benar

use App\Http\Controllers\Controller; // Import base Controller
use Illuminate\Http\Request;
use Illuminate\View\View; // Import View

class GuruDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard untuk Guru.
     */
    public function index(): View // Tambahkan return type View
    {
        // Untuk saat ini, kita hanya akan me-return view.
        // Nanti kita bisa passing data ke view ini (misal: total siswa, total kuis)
        return view('guru.dashboard'); // Ini berarti view ada di resources/views/guru/dashboard.blade.php
    }
}
