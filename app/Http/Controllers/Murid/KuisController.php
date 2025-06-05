<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Kuis;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\KuisAttempt;
use App\Models\PilihanJawaban;
use Illuminate\Support\Facades\DB; // Anda sudah import ini, bagus untuk transaksi nanti
use Illuminate\Http\RedirectResponse; // <-- PASTIKAN IMPORT INI ADA DAN BENAR

class KuisController extends Controller
{

    public function index(): View
    {
        // Ubah menjadi seperti ini (hapus ->where('is_published', true)):
        $quizzes = Kuis::withCount('pertanyaan')    // Menghitung jumlah pertanyaan
            ->latest()                   // Urutkan dari yang terbaru
            ->paginate(9);              // Paginasi, misal 9 kuis per halaman

        return view('murid.kuis.index', [
            'quizzes' => $quizzes,
        ]);
    }
    /**
     * Menampilkan halaman pengerjaan kuis untuk murid.
     * @param Kuis $kui Objek kuis yang akan dikerjakan (Route Model Binding)
     * @return View
     */
    public function mulai(Kuis $kui): View
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $kui->load(['pertanyaan' => function ($query) {
            $query->with('pilihanJawaban')->orderBy('id');
        }]);

        return view('murid.kuis.kerjakan', [
            'kuis' => $kui,
            'pertanyaanKuis' => $kui->pertanyaan,
        ]);
    }

    /**
     * Menerima, menilai, dan menyimpan jawaban kuis dari murid.
     * @param Request $request
     * @param Kuis $kui
     * @return RedirectResponse // Pastikan ini adalah RedirectResponse dari Illuminate\Http
     */
    public function submit(Request $request, Kuis $kui): RedirectResponse
    {
        $user = Auth::user();

        $validatedAnswers = $request->validate([
            'jawaban' => 'required|array',
            'jawaban.*' => 'required|integer|exists:pilihan_jawaban,id',
        ]);

        $submittedAnswers = $validatedAnswers['jawaban'];
        $totalQuestionsInQuiz = $kui->pertanyaan()->count();

        // Optional: Validasi tambahan jika semua pertanyaan wajib dijawab
        // if (count($submittedAnswers) !== $totalQuestionsInQuiz) {
        //     return back()->withErrors(['jawaban' => 'Semua pertanyaan wajib diisi.'])->withInput();
        // }

        $skor = 0;
        $jumlahBenar = 0;

        // DB::beginTransaction(); // Aktifkan jika ingin menggunakan transaksi

        try {
            $kuisAttempt = KuisAttempt::create([
                'user_id' => $user->id,
                'kuis_id' => $kui->id,
            ]);

            foreach ($submittedAnswers as $pertanyaanId => $pilihanJawabanId) {
                $pilihanDipilih = PilihanJawaban::find($pilihanJawabanId);
                $isJawabanBenar = false;

                if ($pilihanDipilih && $pilihanDipilih->pertanyaan_id == $pertanyaanId) {
                    $isJawabanBenar = $pilihanDipilih->is_benar;
                    if ($isJawabanBenar) {
                        $jumlahBenar++;
                    }
                }

                $kuisAttempt->attemptAnswers()->create([
                    'pertanyaan_id' => $pertanyaanId,
                    'pilihan_jawaban_id' => $pilihanJawabanId,
                    'is_benar' => $isJawabanBenar,
                ]);
            }

            if ($totalQuestionsInQuiz > 0) {
                $skor = round(($jumlahBenar / $totalQuestionsInQuiz) * 100);
            } else {
                $skor = 0;
            }

            $kuisAttempt->update(['skor' => $skor]);

            // DB::commit(); // Aktifkan jika menggunakan transaksi

            return redirect()->route('murid.kuis.hasil', $kuisAttempt->id);
        } catch (\Exception $e) {
            // DB::rollBack(); // Aktifkan jika menggunakan transaksi

            // Sebaiknya log errornya untuk development:
            // \Log::error("Error submitting quiz: " . $e->getMessage() . " - Trace: " . $e->getTraceAsString());
            // return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan jawaban Anda. Silakan coba lagi.');
            // Untuk debugging langsung:
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function hasil(KuisAttempt $kuisAttempt): View
    {
        // Otorisasi: Pastikan murid yang login adalah pemilik upaya kuis ini
        if ($kuisAttempt->user_id !== Auth::id()) {
            abort(403, 'Anda tidak berhak melihat hasil kuis ini.');
        }

        // Eager load data Kuis terkait untuk ditampilkan di halaman hasil (opsional, tapi berguna)
        $kuisAttempt->load('kuis', 'user');
        // Jika ingin menampilkan detail jawaban, bisa juga load 'attemptAnswers.pertanyaan', 'attemptAnswers.pilihanJawaban'
        // $kuisAttempt->load('kuis', 'user', 'attemptAnswers.pertanyaan.pilihanJawaban');


        return view('murid.kuis.hasil', [
            'attempt' => $kuisAttempt,
        ]);
        // View akan berada di resources/views/murid/kuis/hasil.blade.php
    }
}
