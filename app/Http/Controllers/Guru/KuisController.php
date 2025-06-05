<?php

namespace App\Http\Controllers\Guru; // Pastikan namespace sudah benar

use App\Http\Controllers\Controller;
use App\Models\Kuis; // Import model Kuis
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth untuk mendapatkan user yang login
use Illuminate\View\View; // Import View
use Illuminate\Http\RedirectResponse; // Import untuk redirect

class KuisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Ambil user yang sedang login (Guru)
        $guru = Auth::user();

        // Ambil semua kuis milik guru tersebut, urutkan dari yang terbaru
        // Kita menggunakan relasi 'kuis()' yang sudah kita definisikan di model User
        $daftarKuis = $guru->kuis()->latest()->paginate(10); // Menggunakan paginate untuk daftar yang panjang

        // Kirim data kuis ke view
        return view('guru.kuis.index', [
            'quizzes' => $daftarKuis,
        ]);
        // Ini berarti view akan berada di resources/views/guru/kuis/index.blade.php
    }

    public function create(): View // Tambahkan return type View
    {
        // Hanya menampilkan view dengan form untuk membuat kuis baru
        return view('guru.kuis.create');
        // Ini berarti view akan berada di resources/views/guru/kuis/create.blade.php
    }

    public function store(Request $request): RedirectResponse // Tambahkan tipe data Request dan RedirectResponse
    {
        // Untuk saat ini, kita buat placeholder dulu.
        // Nanti kita akan tambahkan validasi dan logika penyimpanan data di sini.
        // dd($request->all()); // 'dd' adalah 'die and dump', berguna untuk debugging melihat data request

        // Contoh redirect setelah berhasil (nantinya)
        // return redirect()->route('guru.kuis.index')->with('success', 'Kuis berhasil dibuat!');

        // Untuk sekarang, agar tidak error dan form bisa tampil, cukup redirect saja atau dd()
        // Atau jika ingin langsung mencoba prosesnya:
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Auth::user()->kuis()->create([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        return redirect()->route('guru.kuis.index')->with('success', 'Kuis berhasil dibuat!');
    }

    public function show(Kuis $kui): View
    {
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGAKSES KUIS INI.');
        }

        // Eager load relasi 'pertanyaan' beserta 'pilihanJawaban' untuk setiap pertanyaan
        $pertanyaanKuis = $kui->pertanyaan()
            ->with('pilihanJawaban') // <-- TAMBAHKAN INI
            ->orderBy('created_at')
            ->get();

        return view('guru.kuis.show', [
            'kuis'      => $kui,
            'questions' => $pertanyaanKuis,
        ]);
    }

    public function edit(Kuis $kui): View // Menggunakan Route Model Binding Kuis $kui
    {
        // Pastikan kuis ini milik guru yang sedang login
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGEDIT KUIS INI.');
        }

        return view('guru.kuis.edit', [
            'kuis' => $kui, // Kirim objek kuis ke view
        ]);
        // View akan berada di resources/views/guru/kuis/edit.blade.php
    }

    public function update(Request $request, Kuis $kui): RedirectResponse
    {
        // Pastikan kuis ini milik guru yang sedang login
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGUPDATE KUIS INI.');
        }

        // Validasi data request
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data kuis
        $kui->update($validatedData);

        // Redirect kembali ke halaman detail kuis dengan pesan sukses
        return redirect()->route('guru.kuis.show', $kui->id)->with('success', 'Detail kuis berhasil diperbarui!');
    }

    public function destroy(Kuis $kui): RedirectResponse // Menggunakan Route Model Binding Kuis $kui
    {
        // Pastikan kuis ini milik guru yang sedang login
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGHAPUS KUIS INI.');
        }

        // Hapus kuis
        // Karena kita sudah mengatur onDelete('cascade') di migration untuk tabel pertanyaan
        // dan pilihan_jawaban, maka semua pertanyaan dan pilihan jawaban terkait
        // akan otomatis terhapus juga.
        $kui->delete();

        // Redirect kembali ke halaman daftar kuis dengan pesan sukses
        return redirect()->route('guru.kuis.index')->with('success', 'Kuis berhasil dihapus!');
    }
    public function hasilPengerjaan(Kuis $kui): View
    {
        // Otorisasi: Pastikan kuis ini milik guru yang sedang login
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MELIHAT HASIL KUIS INI.');
        }

        // Ambil semua upaya pengerjaan (attempts) untuk kuis ini,
        // beserta data user (murid) yang mengerjakannya. Urutkan berdasarkan skor atau waktu.
        $attempts = $kui->kuisAttempts() // Menggunakan relasi kuisAttempts() di model Kuis
            ->with('user') // Eager load data user (murid)
            ->orderBy('skor', 'desc') // Urutkan berdasarkan skor tertinggi
            ->orderBy('created_at', 'asc') // Lalu berdasarkan waktu pengerjaan
            ->paginate(15); // Paginasi jika banyak attempt

        return view('guru.kuis.hasil_pengerjaan', [
            'kuis' => $kui,
            'attempts' => $attempts,
        ]);
        // View akan berada di resources/views/guru/kuis/hasil_pengerjaan.blade.php
    }
}
