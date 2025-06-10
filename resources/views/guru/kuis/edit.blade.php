{{-- File: resources/views/guru/kuis/edit.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app') {{-- Menggunakan layout khusus Guru --}}

@section('title', 'Edit Kuis')

@section('content')
<div class="content-wrapper py-12">
    <header class="page-header">
        <h1 class="page-title">Edit Kuis: <span class="italic font-normal">{{ $kuis->judul }}</span></h1>
    </header>

    {{-- Menggunakan style .auth-card yang sudah kita buat untuk form --}}
    <div class="auth-card max-w-3xl mx-auto"> {{-- max-w-3xl agar lebih lebar --}}
        <form method="POST" action="{{ route('guru.kuis.update', $kuis->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul" class="form-label">{{ __('Judul Kuis') }}</label>
                <input id="judul" class="form-input" type="text" name="judul" value="{{ old('judul', $kuis->judul) }}" required autofocus />
                @error('judul')
                    <p class="input-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi" class="form-label">{{ __('Deskripsi (Opsional)') }}</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="form-input">{{ old('deskripsi', $kuis->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="input-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('guru.kuis.show', $kuis->id) }}" class="auth-link mr-4">Batal</a>
                <button type="submit" class="form-button" style="width: auto;">
                    {{ __('Update Kuis') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection