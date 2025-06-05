<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Materi; // Import model Materi
use Illuminate\Http\Request;
use Illuminate\View\View; // Import View
// Auth tidak perlu di sini jika route sudah dilindungi middleware

class MateriController extends Controller
{
    public function index(): View
    {
        $daftarMateri = Materi::where('is_published', true) // Hanya ambil materi yang sudah publish
            ->with('user') // Eager load data Guru (pembuat materi)
            ->latest()     // Urutkan dari yang terbaru
            ->paginate(9);  // Paginasi, misal 9 item per halaman

        return view('murid.materi.index', [
            'materials' => $daftarMateri,
        ]);
    }

    public function show(Materi $materi): View // Route Model Binding
    {
        // Pastikan materi yang diakses sudah dipublikasikan dan bisa dilihat murid
        if (!$materi->is_published) {
            abort(404); // Atau 403 jika ingin pesan akses ditolak
        }

        // Materi sudah otomatis di-inject berkat Route Model Binding
        return view('murid.materi.show', [
            'materi' => $materi,
        ]);
    }
}
