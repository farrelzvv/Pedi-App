{{-- File: resources/views/guru/pertanyaan/edit.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app')

@section('title', 'Edit Pertanyaan')

@section('content')
<div class="content-wrapper py-12">
    <header class="page-header">
        <div>
            <h1 class="page-title">Edit Pertanyaan</h1>
            <p class="mt-1 text-sm text-gray-500">
                Untuk Kuis: <span class="font-semibold">{{ $kuis->judul }}</span>
            </p>
        </div>
    </header>

    <div class="auth-card max-w-4xl mx-auto">
        <form method="POST" action="{{ route('guru.kuis.pertanyaan.update', ['kui' => $kuis->id, 'pertanyaan' => $pertanyaan->id]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="tipe_pertanyaan" value="{{ $pertanyaan->tipe_pertanyaan }}">

            <div class="form-group">
                <label for="teks_pertanyaan" class="form-label">Teks Pertanyaan <span class="text-red-500">*</span></label>
                <textarea id="teks_pertanyaan" name="teks_pertanyaan" rows="3" required class="form-input">{{ old('teks_pertanyaan', $pertanyaan->teks_pertanyaan) }}</textarea>
                @error('teks_pertanyaan') <p class="input-error-message">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Pilihan Jawaban (Pilih satu jawaban benar) <span class="text-red-500">*</span></label>
                <div class="space-y-3 mt-2">
                    @if($pertanyaan->pilihanJawaban->isNotEmpty())
                        @foreach ($pertanyaan->pilihanJawaban as $pilihan)
                        <div class="flex items-center space-x-3 p-3 border rounded-md bg-white">
                            <input type="hidden" name="pilihan_id[]" value="{{ $pilihan->id }}">
                            <input type="radio" name="is_benar_pilihan_id" value="{{ $pilihan->id }}" id="is_benar_{{ $pilihan->id }}" 
                                   class="focus:ring-pink-500 h-4 w-4 text-pink-600 border-gray-300"
                                   {{ old('is_benar_pilihan_id', $pertanyaan->pilihanJawaban->firstWhere('is_benar', true)->id ?? null) == $pilihan->id ? 'checked' : '' }} required>

                            <input type="text" name="pilihan_teks[{{ $pilihan->id }}]" id="pilihan_teks_{{ $pilihan->id }}" 
                                   value="{{ old('pilihan_teks.'.$pilihan->id, $pilihan->teks_pilihan) }}"
                                   class="form-input flex-grow">
                        </div>
                        @error('pilihan_teks.'.$pilihan->id) <p class="input-error-message">{{ $message }}</p> @enderror
                        @endforeach
                    @endif
                </div>
                @error('is_benar_pilihan_id') <p class="input-error-message mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end mt-6">
                <a href="{{ route('guru.kuis.show', $kuis->id) }}" class="auth-link mr-4">Batal</a>
                <button type="submit" class="form-button">
                    Update Pertanyaan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection