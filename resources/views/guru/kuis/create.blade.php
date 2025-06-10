{{-- File: resources/views/guru/kuis/create.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app') {{-- Menggunakan layout khusus Guru --}}

@section('title', 'Buat Kuis Baru')

@section('content')
<div class="content-wrapper py-12">

    {{-- Header Halaman --}}
    <header class="page-header">
        <h1 class="page-title">Buat Kuis Baru</h1>
        <a href="{{ route('guru.kuis.index') }}" class="action-button">
            <i class="ri-arrow-left-line"></i>
            <span>Kembali</span>
        </a>
    </header>

    {{-- Menggunakan style .auth-card yang sudah kita buat untuk form --}}
    <div class="auth-card max-w-3xl mx-auto">
        <form method="POST" action="{{ route('guru.kuis.store') }}">
            @csrf

            <div class="form-group">
                <label for="judul" class="form-label">Judul Kuis <span class="text-red-500">*</span></label>
                <input id="judul" class="form-input" type="text" name="judul" value="{{ old('judul') }}" required autofocus />
                @error('judul')
                    <p class="input-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="form-input">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="input-error-message">{{ $message }}</p>
                @enderror
            </div>

            {{-- Anda bisa tambahkan field lain di sini jika perlu, misalnya status publikasi --}}
            {{-- <div class="form-group">
                <label for="is_published" class="flex items-center">
                    <input type="checkbox" name="is_published" id="is_published" value="1" class="rounded border-gray-300 text-pink-600 shadow-sm focus:ring-pink-500">
                    <span class="ml-2 text-sm text-gray-600">Publikasikan Kuis Ini</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-6">
                <button type="submit" class="form-button">
                    {{ __('Simpan Kuis & Lanjut') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection