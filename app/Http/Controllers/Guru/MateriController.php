<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi; // Pastikan model Materi di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth untuk mendapatkan user yang login
use Illuminate\View\View; // Import View
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Ambil user yang sedang login (Guru)
        $guru = Auth::user();

        // Ambil semua materi milik guru tersebut, urutkan dari yang terbaru
        // Kita menggunakan relasi 'materi()' yang sudah kita definisikan di model User
        $daftarMateri = $guru->materi()
            ->latest() // Urutkan berdasarkan created_at (terbaru dulu)
            ->paginate(10); // Menggunakan paginate untuk daftar yang panjang

        // Kirim data materi ke view
        return view('guru.materi.index', [
            'materials' => $daftarMateri,
        ]);
        // View akan berada di resources/views/guru/materi/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Hanya menampilkan view dengan form untuk membuat materi baru
        return view('guru.materi.create');
        // View akan berada di resources/views/guru/materi/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse // <-- PASTIKAN RETURN TYPE INI BENAR
    {
        $tipeMateri = $request->input('tipe_materi');

        $validationRules = [
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'tipe_materi' => 'required|in:teks,file,video_link',
            'is_published' => 'nullable|boolean',
        ];

        if ($tipeMateri === 'teks') {
            $validationRules['konten'] = 'required|string';
        } elseif ($tipeMateri === 'file') {
            $validationRules['file_input'] = 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png,mp4|max:5120'; // Max 5MB
        } elseif ($tipeMateri === 'video_link') {
            $validationRules['url_input'] = 'required|url';
        }

        $validatedData = $request->validate($validationRules);

        $filePath = null;
        $kontenFinal = null;

        if ($tipeMateri === 'file' && $request->hasFile('file_input')) {
            $filePath = $request->file('file_input')->store('materi_files', 'public');
        } elseif ($tipeMateri === 'video_link') {
            $filePath = $validatedData['url_input'];
        } elseif ($tipeMateri === 'teks') {
            $kontenFinal = $validatedData['konten'];
        }

        Auth::user()->materi()->create([
            'judul' => $validatedData['judul'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'konten' => $kontenFinal,
            'file_path' => $filePath,
            'tipe_materi' => $validatedData['tipe_materi'],
            'is_published' => $request->boolean('is_published'), // Menggunakan boolean() lebih aman untuk checkbox
        ]);

        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi): View // Materi $materi otomatis di-inject
    {
        // Otorisasi: Pastikan materi ini milik guru yang sedang login
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MELIHAT MATERI INI.');
        }

        return view('guru.materi.show', [
            'materi' => $materi, // Kirim objek materi ke view
        ]);
        // View akan berada di resources/views/guru/materi/show.blade.php
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi): View // Materi $materi otomatis di-inject
    {
        // Otorisasi: Pastikan materi ini milik guru yang sedang login
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGEDIT MATERI INI.');
        }

        return view('guru.materi.edit', [
            'materi' => $materi, // Kirim objek materi yang akan diedit ke view
        ]);
        // View akan berada di resources/views/guru/materi/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi): RedirectResponse
    {
        // Otorisasi: Pastikan materi ini milik guru yang sedang login
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGUPDATE MATERI INI.');
        }

        $tipeMateriRequest = $request->input('tipe_materi');

        $validationRules = [
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'nullable|string',
            'tipe_materi' => 'required|in:teks,file,video_link',
            'is_published' => 'nullable|boolean',
        ];

        // Validasi kondisional berdasarkan tipe_materi
        if ($tipeMateriRequest === 'teks') {
            $validationRules['konten'] = 'required|string';
        } elseif ($tipeMateriRequest === 'file') {
            // file_input tidak wajib diisi saat update, hanya jika ingin mengganti
            $validationRules['file_input'] = 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png,mp4|max:5120'; // Max 5MB
        } elseif ($tipeMateriRequest === 'video_link') {
            $validationRules['url_input'] = 'required|url';
        }

        $validatedData = $request->validate($validationRules);

        // Siapkan data untuk diupdate
        $updateData = [
            'judul' => $validatedData['judul'],
            'deskripsi_singkat' => $validatedData['deskripsi_singkat'],
            'tipe_materi' => $validatedData['tipe_materi'],
            'is_published' => $request->boolean('is_published'),
            // Defaultkan konten dan file_path ke null dulu, akan diisi berdasarkan tipe
            'konten' => null,
            'file_path' => null,
        ];

        $oldFilePath = $materi->file_path;
        $oldTipeMateri = $materi->tipe_materi;

        if ($validatedData['tipe_materi'] === 'file') {
            if ($request->hasFile('file_input')) {
                // Hapus file lama jika ada dan jika tipenya sebelumnya juga file atau pathnya ada
                if ($oldFilePath) {
                    Storage::disk('public')->delete($oldFilePath);
                }
                // Simpan file baru
                $updateData['file_path'] = $request->file('file_input')->store('materi_files', 'public');
            } else {
                // Tidak ada file baru diupload, gunakan file lama JIKA tipe materi tidak berubah dari 'file'
                if ($oldTipeMateri === 'file') {
                    $updateData['file_path'] = $oldFilePath;
                }
            }
        } elseif ($validatedData['tipe_materi'] === 'video_link') {
            $updateData['file_path'] = $validatedData['url_input'];
            // Jika tipe sebelumnya adalah file, hapus file lama
            if ($oldTipeMateri === 'file' && $oldFilePath) {
                Storage::disk('public')->delete($oldFilePath);
            }
        } elseif ($validatedData['tipe_materi'] === 'teks') {
            $updateData['konten'] = $validatedData['konten'];
            // Jika tipe sebelumnya adalah file, hapus file lama
            if ($oldTipeMateri === 'file' && $oldFilePath) {
                Storage::disk('public')->delete($oldFilePath);
            }
        }

        // Jika tipe materi berubah dari 'file' ke tipe lain dan tidak ada file baru diupload (sudah ditangani di atas)
        // atau jika tipe materi berubah dari 'video_link'/'teks' ke 'file' tapi tidak ada file baru diupload
        // pastikan file_path atau konten yang tidak relevan di-null-kan (sudah di-default null di $updateData)

        $materi->update($updateData);

        return redirect()->route('guru.materi.show', $materi->id)->with('success', 'Materi berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi): RedirectResponse
    {
        // Otorisasi: Pastikan materi ini milik guru yang sedang login
        if ($materi->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK BERHAK MENGHAPUS MATERI INI.');
        }

        // Jika materi berupa file dan ada file_path-nya, hapus file dari storage
        if ($materi->tipe_materi === 'file' && $materi->file_path) {
            Storage::disk('public')->delete($materi->file_path);
        }
        // Catatan: Jika tipe materi adalah 'video_link', file_path berisi URL, jadi tidak perlu dihapus dari storage.
        // Konten teks akan terhapus otomatis saat record database dihapus.

        // Hapus record materi dari database
        $materi->delete();

        // Redirect kembali ke halaman daftar materi dengan pesan sukses
        return redirect()->route('guru.materi.index')->with('success', 'Materi berhasil dihapus!');
    }
}
