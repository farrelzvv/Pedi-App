{{-- File: resources/views/guru/kuis/index.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app') {{-- Menggunakan layout khusus Guru --}}

@section('title', 'Manajemen Kuis')

@section('content')
<div class="content-wrapper py-12">

    {{-- Header Halaman --}}
    <header class="page-header">
        <h1 class="page-title">Manajemen Kuis</h1>
        <a href="{{ route('guru.kuis.create') }}" class="action-button">
            <i class="ri-add-line"></i>
            <span>Tambah Kuis Baru</span>
        </a>
    </header>

    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Container Tabel --}}
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Jumlah Soal</th>
                    <th>Tanggal Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($quizzes as $kuis)
                    <tr>
                        <td class="font-semibold">{{ $kuis->judul }}</td>
                        <td>{{ $kuis->pertanyaan_count }} Soal</td>
                        <td>{{ $kuis->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="table-actions">
                                <a href="{{ route('guru.kuis.hasilPengerjaan', $kuis->id) }}" class="link-results" title="Lihat Hasil">Hasil</a>
                                <a href="{{ route('guru.kuis.show', $kuis->id) }}" class="link-view" title="Atur Soal">Atur Soal</a>
                                <a href="{{ route('guru.kuis.edit', $kuis->id) }}" class="link-edit" title="Edit Kuis">Edit</a>
                                <form action="{{ route('guru.kuis.destroy', $kuis->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kuis ini? Semua pertanyaan & hasil terkait akan terhapus.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="link-delete" title="Hapus Kuis">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">
                            Anda belum membuat kuis apapun.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginasi --}}
    @if ($quizzes->hasPages())
        <div class="mt-6">
            {{ $quizzes->links() }} {{-- Anda mungkin perlu mempublish dan men-style view paginasi jika belum sesuai --}}
        </div>
    @endif

</div>
@endsection