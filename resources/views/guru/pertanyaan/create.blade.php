{{-- File: resources/views/guru/pertanyaan/create.blade.php --}}
@extends('layouts.guru_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'Dashboard Utama') {{-- Judul halaman dinamis --}}

@section('content')
        {{-- 1. Ini Info Website (Hero Section dari HTML Anda) --}}
    <header class="section__container header__container" id="home">
        <div class="header__image">
            {{-- Ganti path gambar sesuai dengan lokasi di public/landing_page_assets/ --}}
            <img src="{{ asset('landing_page_assets/images/header.png') }}" alt="header" />
        </div>
        <div class="header__content">
            <h1><span>Tambah Pertanyaan</span> {{ $kuis->judul }}</h1>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="{{ route('guru.kuis.show', $kuis->id) }}" class="btn btn-outline ml-2">Kembali</a>
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>

    <div class="py-12 bg-gray-100"> <!-- background abu-abu lembut -->
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <!-- Judul di tengah -->
        <h2 class="text-center text-2xl font-semibold mb-6">Buat disini</h2>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('guru.kuis.pertanyaan.store', $kuis->id) }}">
                    @csrf {{-- Token CSRF --}}

                    <div>
                        <label for="teks_pertanyaan" class="block font-medium text-sm text-gray-700">{{ __('Teks Pertanyaan') }}</label>
                        <textarea id="teks_pertanyaan" name="teks_pertanyaan" rows="3" required
                                  class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('teks_pertanyaan') }}</textarea>
                        @error('teks_pertanyaan')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tipe Pertanyaan (untuk saat ini kita fokus ke pilihan ganda) --}}
                    <input type="hidden" name="tipe_pertanyaan" value="pilihan_ganda">

                    <div class="mt-6">
                        <h3 class="text-md font-semibold text-gray-700 mb-2">Pilihan Jawaban (Pilih satu jawaban benar)</h3>
                        @php $jumlahPilihan = 4; @endphp {{-- Anda bisa ubah ke 5 jika mau --}}

                        @for ($i = 0; $i < $jumlahPilihan; $i++)
                        <div class="mt-3 p-3 border rounded-md @if ($errors->has('pilihan_teks.'.$i) || ($errors->has('is_benar_index') && old('is_benar_index') == $i && empty(old('pilihan_teks.'.$i)))) border-red-300 @endif">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="is_benar_index" value="{{ $i }}" id="is_benar_{{ $i }}" 
                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                       {{ old('is_benar_index') == $i ? 'checked' : '' }} required>

                                <label for="pilihan_teks_{{ $i }}" class="sr-only">Teks Pilihan {{ $i + 1 }}</label>
                                <input type="text" name="pilihan_teks[]" id="pilihan_teks_{{ $i }}" 
                                       placeholder="Teks Pilihan {{ $i + 1 }}"
                                       value="{{ old('pilihan_teks.'.$i) }}"
                                       class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 flex-grow">
                            </div>
                            @error('pilihan_teks.'.$i)
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            @if ($errors->has('is_benar_index') && old('is_benar_index') == $i && empty(old('pilihan_teks.'.$i)) && $errors->first('pilihan_teks.'.$i) == '')
                                <p class="mt-1 text-xs text-red-600">Teks pilihan tidak boleh kosong jika ditandai sebagai jawaban benar.</p>
                            @endif
                        </div>
                        @endfor
                        @error('is_benar_index')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('pilihan_teks')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Simpan Pertanyaan') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection