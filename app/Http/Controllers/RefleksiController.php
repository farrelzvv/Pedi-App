<?php

namespace App\Http\Controllers; // 1. Pastikan namespace ini

use App\Http\Controllers\Controller;
use App\Models\RefleksiPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse; // Penting untuk return type redirect

class RefleksiController extends Controller // 3. Pastikan class Anda extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Melindungi semua method di controller ini
    }

    public function index(): View
    {
        $posts = RefleksiPost::whereNull('parent_id')
            ->with(['user', 'replies.user', 'replies.replies.user'])
            ->oldest() // <-- UBAH DARI latest() MENJADI oldest()
            ->paginate(10);

        return view('refleksi.index', compact('posts'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'konten_teks' => 'nullable|string|required_without:gambar_input',
            'gambar_input' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Maks 2MB
            'parent_id' => 'nullable|integer|exists:refleksi_posts,id',
        ]);

        if (empty($validatedData['konten_teks']) && !$request->hasFile('gambar_input')) {
            return back()->withErrors(['konten_teks' => 'Refleksi tidak boleh kosong (minimal teks atau gambar).'])->withInput();
        }

        $gambarPath = null;
        if ($request->hasFile('gambar_input')) {
            $gambarPath = $request->file('gambar_input')->store('refleksi_images', 'public');
        }

        Auth::user()->refleksiPosts()->create([
            'parent_id' => $validatedData['parent_id'] ?? null,
            'konten_teks' => $validatedData['konten_teks'],
            'gambar_path' => $gambarPath,
        ]);

        return redirect()->route('refleksi.index')->with('success', 'Refleksi berhasil diposting!');
    }
}
