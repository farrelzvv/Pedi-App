<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\View\View;   // Import View
use Illuminate\Http\RedirectResponse; // <-- PASTIKAN IMPORT INI BENAR
use App\Models\PilihanJawaban;
use App\Models\Kuis;       // Kita butuh model Kuis

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Kuis $kui): View // Terima Kuis $kui sebagai parameter
    {
        // Pastikan kuis ini milik guru yang sedang login (opsional, karena route sudah dilindungi)
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENAMBAHKAN PERTANYAAN PADA KUIS INI.');
        }

        // Hanya menampilkan view dengan form untuk membuat pertanyaan baru untuk kuis tertentu
        return view('guru.pertanyaan.create', [
            'kuis' => $kui, // Kirim objek kuis ke view
        ]);
        // View akan berada di resources/views/guru/pertanyaan/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Kuis $kui): RedirectResponse
    {
        // Pastikan kuis ini milik guru yang sedang login
        if ($kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENAMBAHKAN PERTANYAAN PADA KUIS INI.');
        }

        // Validasi data request
        $validatedData = $request->validate([
            'teks_pertanyaan' => 'required|string',
            'tipe_pertanyaan' => 'required|string|in:pilihan_ganda', // Pastikan tipe_pertanyaan sesuai
            'pilihan_teks' => 'required|array|min:2', // Minimal ada 2 pilihan jawaban
            'pilihan_teks.*' => 'required|string|max:255', // Setiap pilihan teks wajib diisi
            'is_benar_index' => 'required|integer|min:0', // Index jawaban benar wajib ada dan berupa angka
        ]);

        // Cek apakah is_benar_index valid (tidak melebihi jumlah pilihan_teks)
        if ($validatedData['is_benar_index'] >= count($validatedData['pilihan_teks'])) {
            return back()->withErrors(['is_benar_index' => 'Pilihan jawaban benar tidak valid.'])->withInput();
        }
        // Cek apakah teks pilihan yang ditandai benar itu diisi
        if (empty($validatedData['pilihan_teks'][$validatedData['is_benar_index']])) {
            return back()->withErrors(['pilihan_teks.' . $validatedData['is_benar_index'] => 'Teks pilihan yang ditandai benar tidak boleh kosong.'])->withInput();
        }


        // 1. Simpan Pertanyaan
        $pertanyaan = $kui->pertanyaan()->create([
            'teks_pertanyaan' => $validatedData['teks_pertanyaan'],
            'tipe_pertanyaan' => $validatedData['tipe_pertanyaan'],
        ]);

        // 2. Simpan Pilihan Jawaban
        foreach ($validatedData['pilihan_teks'] as $index => $teksPilihan) {
            $pertanyaan->pilihanJawaban()->create([
                'teks_pilihan' => $teksPilihan,
                'is_benar' => ($index == $validatedData['is_benar_index']), // Tandai sebagai benar jika indexnya cocok
            ]);
        }

        return redirect()->route('guru.kuis.show', $kui->id)->with('success_pertanyaan', 'Pertanyaan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kuis $kui, Pertanyaan $pertanyaan): View
    {
        // Otorisasi: Pastikan pertanyaan ini milik kuis yang benar,
        // dan kuis tersebut milik guru yang sedang login.
        if ($pertanyaan->kuis_id !== $kui->id || $kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGEDIT PERTANYAAN INI.');
        }

        // Load pilihan jawaban untuk pertanyaan ini agar bisa ditampilkan di form edit
        $pertanyaan->load('pilihanJawaban');

        return view('guru.pertanyaan.edit', [
            'kuis' => $kui,
            'pertanyaan' => $pertanyaan, // Kirim objek pertanyaan ke view
        ]);
        // View akan berada di resources/views/guru/pertanyaan/edit.blade.php
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kuis $kui, Pertanyaan $pertanyaan): RedirectResponse
    {
        // Otorisasi: Pastikan pertanyaan ini milik kuis yang benar,
        // dan kuis tersebut milik guru yang sedang login.
        if ($pertanyaan->kuis_id !== $kui->id || $kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGUPDATE PERTANYAAN INI.');
        }

        // Validasi data request
        $validatedData = $request->validate([
            'teks_pertanyaan' => 'required|string',
            'tipe_pertanyaan' => 'required|string|in:pilihan_ganda', // Asumsi tipe tidak diubah
            'pilihan_id'      => 'required|array', // Array dari ID pilihan jawaban yang ada
            'pilihan_id.*'    => 'required|integer|exists:pilihan_jawaban,id', // Setiap ID harus ada di tabel pilihan_jawaban
            'pilihan_teks'    => 'required|array', // Array dari teks pilihan jawaban, di-key berdasarkan ID pilihan
            'pilihan_teks.*'  => 'required|string|max:255', // Setiap teks pilihan wajib diisi
            'is_benar_pilihan_id' => 'required|integer|exists:pilihan_jawaban,id', // ID dari pilihan yang benar
        ]);

        // 1. Update teks pertanyaan
        $pertanyaan->update([
            'teks_pertanyaan' => $validatedData['teks_pertanyaan'],
            // 'tipe_pertanyaan' => $validatedData['tipe_pertanyaan'], // Jika tipe bisa diubah
        ]);

        // 2. Update Pilihan Jawaban yang ada
        foreach ($validatedData['pilihan_id'] as $pilihanId) {
            // Pastikan ID pilihan ada di dalam array teks pilihan dari request
            if (isset($validatedData['pilihan_teks'][$pilihanId])) {
                $pilihanToUpdate = PilihanJawaban::find($pilihanId);

                // Double check bahwa pilihan jawaban ini memang milik pertanyaan yang sedang diedit
                if ($pilihanToUpdate && $pilihanToUpdate->pertanyaan_id === $pertanyaan->id) {
                    $pilihanToUpdate->update([
                        'teks_pilihan' => $validatedData['pilihan_teks'][$pilihanId],
                        'is_benar'     => ($pilihanId == $validatedData['is_benar_pilihan_id']),
                    ]);
                }
            }
        }
        // Catatan: Logika di atas hanya mengupdate pilihan yang sudah ada.
        // Jika Anda ingin menambah/menghapus pilihan secara dinamis di form edit,
        // logikanya akan lebih kompleks (misal: hapus pilihan yang tidak ada di request, tambah pilihan baru).
        // Untuk saat ini, kita asumsikan jumlah pilihan tetap dan hanya mengupdate yang ada.

        return redirect()->route('guru.kuis.show', $kui->id)->with('success_pertanyaan', 'Pertanyaan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kuis $kui, Pertanyaan $pertanyaan): RedirectResponse
    {
        // Otorisasi: Pastikan pertanyaan ini milik kuis yang benar,
        // dan kuis tersebut milik guru yang sedang login.
        if ($pertanyaan->kuis_id !== $kui->id || $kui->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGHAPUS PERTANYAAN INI.');
        }

        // Hapus pertanyaan.
        // Karena kita sudah mengatur onDelete('cascade') di migration untuk tabel pilihan_jawaban
        // (yang foreign key-nya merujuk ke pertanyaan_id), maka semua pilihan jawaban
        // yang terkait dengan pertanyaan ini akan otomatis terhapus juga.
        $pertanyaan->delete();

        // Redirect kembali ke halaman detail kuis dengan pesan sukses
        return redirect()->route('guru.kuis.show', $kui->id)->with('success_pertanyaan', 'Pertanyaan berhasil dihapus dari kuis!');
    }
}
