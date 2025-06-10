{{-- File: resources/views/guru/kuis/hasil_pengerjaan.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app')

@section('title', 'Hasil Pengerjaan Kuis')

@section('content')
<div class="content-wrapper py-12">

    {{-- Header Halaman --}}
    <header class="page-header">
        <div>
            <h1 class="page-title">Laporan Hasil Kuis</h1>
            <p class="mt-1 text-sm text-gray-500">
                Kuis: <span class="font-semibold">{{ $kuis->judul }}</span>
            </p>
        </div>
        <a href="{{ route('guru.kuis.index') }}" class="action-button">
            <i class="ri-arrow-left-line"></i>
            <span>Kembali</span>
        </a>
    </header>

    {{-- Container Tabel --}}
    <div class="data-table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Murid</th>
                    <th>Skor</th>
                    <th>Waktu Pengerjaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attempts as $index => $attempt)
                    <tr>
                        <td>{{ $attempts->firstItem() + $index }}</td>
                        <td class="font-semibold">{{ $attempt->user->name ?? 'User tidak ditemukan' }}</td>
                        <td>
                            <span class="font-bold text-lg {{ $attempt->skor >= 75 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $attempt->skor }}
                            </span>
                        </td>
                        <td>{{ $attempt->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">
                            Belum ada siswa yang mengerjakan kuis ini.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginasi --}}
    @if ($attempts->hasPages())
        <div class="mt-6">
            {{ $attempts->links() }}
        </div>
    @endif

</div>
@endsection