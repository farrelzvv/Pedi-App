{{-- File: resources/views/guru/kuis/edit.blade.php --}}
{{-- File: resources/views/guru/siswa/index.blade.php --}}
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
            <h1><span>Edit Kuis</span> -{{ $kuis->judul }}</h1>
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

    <section class="bg-gray-50 py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Edit disini</h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('guru.kuis.update', $kuis->id) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="judul" class="block font-medium text-sm text-gray-700">{{ __('Judul Kuis') }}</label>
                        <input id="judul" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               type="text" name="judul" value="{{ old('judul', $kuis->judul) }}" required autofocus />
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="deskripsi" class="block font-medium text-sm text-gray-700">{{ __('Deskripsi (Opsional)') }}</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4"
                                  class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('deskripsi', $kuis->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Update Kuis') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection