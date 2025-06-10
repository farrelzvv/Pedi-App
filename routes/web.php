<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\DashboardController; // Kita tidak pakai ini untuk /guru/dashboard
use App\Http\Controllers\Guru\GuruDashboardController; // Ini yang kita pakai untuk /guru/dashboard
// Jika Anda punya HomeController untuk route /home, uncomment ini
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\Guru\SiswaController;
use App\Http\Controllers\Guru\KuisController;
use App\Http\Controllers\Guru\PertanyaanController;
use App\Models\Kuis;
use App\Http\Controllers\Murid\KuisController as MuridKuisController;
use App\Http\Controllers\Guru\MateriController;
use App\Http\Controllers\Murid\MateriController as MuridMateriController;
use App\Http\Controllers\RefleksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Route Dashboard Utama (untuk semua user yang login & terverifikasi)
// Ini adalah "Page Home" Anda
Route::get('/dashboard', function () {
    // Ambil semua kuis, urutkan dari yang terbaru, dan hitung jumlah pertanyaannya
    // Kita bisa gunakan withCount untuk efisiensi menghitung relasi
    $quizzes = Kuis::withCount('pertanyaan') // Membuat kolom 'pertanyaan_count'
        ->latest() // Urutkan berdasarkan created_at (terbaru dulu)
        ->paginate(6); // Ambil 6 kuis per halaman (sesuaikan jika mau)
    // Atau ->get() jika tidak ingin pagination untuk daftar ini

    return view('dashboard', [
        'quizzes' => $quizzes // Kirim data kuis ke view
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');



// Route untuk Profile Pengguna (dari Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// === ROUTE KHUSUS BERDASARKAN ROLE ===

// Group untuk Route Khusus MURID (role:1)
Route::middleware(['auth', 'role:1'])->prefix('murid')->name('murid.')->group(function () {
    // Contoh jika Murid punya dashboard sendiri atau halaman khusus:
    // Route::get('/dashboard', [MuridDashboardController::class, 'index'])->name('dashboard');
    Route::get('/kuis', [MuridKuisController::class, 'index'])->name('kuis.index');
    // Route untuk Murid memulai/mengerjakan kuis (BARU)
    Route::get('/kuis/{kui}/mulai', [MuridKuisController::class, 'mulai'])->name('kuis.mulai');
    // Nanti kita akan tambahkan route POST untuk submit jawaban kuis di sini
    Route::post('/kuis/{kui}/submit', [MuridKuisController::class, 'submit'])->name('kuis.submit');
    Route::get('/kuis/attempt/{kuisAttempt}/hasil', [MuridKuisController::class, 'hasil'])->name('kuis.hasil');
    // --- Route untuk MATERI (Murid) ---
    Route::get('/materi', function () {
        return view('murid.materi.index');
    })->name('materi.index');
});



// Group untuk Route Khusus GURU (role:0)
Route::middleware(['auth', 'role:0'])->prefix('guru')->name('guru.')->group(function () {
    // Dashboard utama untuk Guru
    Route::get('/dashboard', [GuruDashboardController::class, 'index'])->name('dashboard');

    // Route untuk menampilkan daftar siswa (BARU DITAMBAHKAN)
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');

    // Route untuk Manajemen Kuis (BARU DITAMBAHKAN)
    Route::get('/kuis', [KuisController::class, 'index'])->name('kuis.index');
    Route::get('/kuis/create', [KuisController::class, 'create'])->name('kuis.create'); // Menampilkan form buat kuis (BARU)
    Route::post('/kuis', [KuisController::class, 'store'])->name('kuis.store'); // Menyimpan kuis baru (BARU)
    Route::get('/kuis/{kui}', [KuisController::class, 'show'])->name('kuis.show'); // Menampilkan detail satu kuis (BARU)
    Route::get('/kuis/{kui}/edit', [KuisController::class, 'edit'])->name('kuis.edit');
    Route::put('/kuis/{kui}', [KuisController::class, 'update'])->name('kuis.update');
    Route::delete('/kuis/{kui}', [KuisController::class, 'destroy'])->name('kuis.destroy');
    // Route untuk Guru melihat hasil pengerjaan kuis oleh murid (BARU)
    Route::get('/kuis/{kui}/hasil-pengerjaan', [KuisController::class, 'hasilPengerjaan'])->name('kuis.hasilPengerjaan');
    // --- Route untuk Manajemen MATERI (BARU DITAMBAHKAN) ---
    Route::resource('/materi', MateriController::class);


    // --- Route untuk Manajemen PERTANYAAN dalam sebuah Kuis ---
    // Route untuk menampilkan form tambah pertanyaan baru ke kuis tertentu (BARU)
    Route::get('/kuis/{kui}/pertanyaan/create', [PertanyaanController::class, 'create'])->name('kuis.pertanyaan.create');
    Route::post('/kuis/{kui}/pertanyaan', [PertanyaanController::class, 'store'])->name('kuis.pertanyaan.store');
    Route::get('/kuis/{kui}/pertanyaan/{pertanyaan}/edit', [PertanyaanController::class, 'edit'])->name('kuis.pertanyaan.edit');
    Route::put('/kuis/{kui}/pertanyaan/{pertanyaan}', [PertanyaanController::class, 'update'])->name('kuis.pertanyaan.update');
    Route::delete('/kuis/{kui}/pertanyaan/{pertanyaan}', [PertanyaanController::class, 'destroy'])->name('kuis.pertanyaan.destroy');
});


// Group untuk Route Khusus MURID (role:1)
Route::middleware(['auth', 'role:1'])->prefix('murid')->name('murid.')->group(function () {
    // Contoh jika Murid punya dashboard sendiri atau halaman khusus:
    // Route::get('/dashboard', [MuridDashboardController::class, 'index'])->name('dashboard');
    // Atau bisa juga route untuk melihat materi, kuis, dll.
    // Route::get('/materi', [MateriController::class, 'indexMurid'])->name('materi.index');

    // Untuk saat ini, kita biarkan kosong jika belum ada halaman spesifik Murid selain /dashboard utama.
    // Jika Murid menggunakan /dashboard utama, tidak perlu ada /murid/dashboard terpisah kecuali kontennya sangat berbeda.
});

// Route untuk Fitur Refleksi (membutuhkan login)
Route::get('/refleksi', [RefleksiController::class, 'index'])->name('refleksi.index');
Route::post('/refleksi', [RefleksiController::class, 'store'])->name('refleksi.store');
Route::get('/petunjuk-penggunaan', function () {
    return view('petunjuk'); // Akan memanggil file resources/views/petunjuk.blade.php
})->name('petunjuk.penggunaan');
/* Tambahkan ini di public/custom_ui/css/dashboard.css */

Route::get('/games', function () {
    return view('games.index'); // Akan memanggil file resources/views/games/index.blade.php
})->name('games.index');
Route::get('/profile-pengembang', function () {
    return view('profile_pengembang');
})->name('profile.pengembang');

// Ini mengimpor route-route untuk autentikasi (login, register, dll.) dari Breeze
require __DIR__ . '/auth.php';
