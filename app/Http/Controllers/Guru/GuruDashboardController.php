<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import model User
use Illuminate\View\View;

class GuruDashboardController extends Controller
{
    public function index(): View
    {
        // Hitung jumlah user dengan role = 1 (Murid)
        $studentCount = User::where('role', 1)->count();

        // Kirim data ke view
        return view('guru.dashboard', [
            'studentCount' => $studentCount,
        ]);
    }
}
