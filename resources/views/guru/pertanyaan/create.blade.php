{{-- File: resources/views/guru/pertanyaan/create.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app') {{-- Menggunakan layout khusus Guru --}}

@section('title', 'Tambah Pertanyaan Baru')

@section('content')
<div class="content-wrapper py-12">
    <header class="page-header">
        <div>
            <h1 class="page-title">Tambah Pertanyaan Baru</h1>
            <p class="mt-1 text-sm text-gray-500">
                Untuk Kuis: <span class="font-semibold">{{ $kuis->judul }}</span>
            </p>
        </div>
    </header>

    <div class="auth-card max-w-4xl mx-auto"> {{-- Menggunakan .auth-card dengan lebar lebih besar --}}
        <form method="POST" action="{{ route('guru.kuis.pertanyaan.store', $kuis->id) }}">
            @csrf
            <input type="hidden" name="tipe_pertanyaan" value="pilihan_ganda">

            <div class="form-group">
                <label for="teks_pertanyaan" class="form-label">Teks Pertanyaan <span class="text-red-500">*</span></label>
                <textarea id="teks_pertanyaan" name="teks_pertanyaan" rows="3" required class="form-input">{{ old('teks_pertanyaan') }}</textarea>
                @error('teks_pertanyaan') <p class="input-error-message">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Pilihan Jawaban (Pilih satu jawaban benar) <span class="text-red-500">*</span></label>
                @php $jumlahPilihan = 4; @endphp
                <div class="space-y-3 mt-2">
                    @for ($i = 0; $i < $jumlahPilihan; $i++)
                    <div class="flex items-center space-x-3 p-3 border rounded-md bg-white">
                        <input type="radio" name="is_benar_index" value="{{ $i }}" id="is_benar_{{ $i }}" 
                               class="focus:ring-pink-500 h-4 w-4 text-pink-600 border-gray-300"
                               {{ old('is_benar_index') == $i ? 'checked' : '' }} required>

                        <input type="text" name="pilihan_teks[]" id="pilihan_teks_{{ $i }}" 
                               placeholder="Teks Pilihan {{ $i + 1 }}" value="{{ old('pilihan_teks.'.$i) }}"
                               class="form-input flex-grow">
                    </div>
                    @error('pilihan_teks.'.$i) <p class="input-error-message">{{ $message }}</p> @enderror
                    @endfor
                </div>
                @error('is_benar_index') <p class="input-error-message mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('guru.kuis.show', $kuis->id) }}" class="auth-link mr-4">Batal</a>
                <button type="submit" class="form-button">
                    Simpan Pertanyaan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection