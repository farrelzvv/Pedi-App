{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.custom_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'Dashboard Utama') {{-- Judul halaman dinamis --}}

@section('content')
    {{-- 1. Ini Info Website (Hero Section dari HTML Anda) --}}
    <header class="section__container header__container" id="home">
        <div class="header__image">
            {{-- Ganti path gambar sesuai dengan lokasi di public/landing_page_assets/ --}}
            <img src="{{ asset('landing_page_assets/images/header.png') }}" alt="header" />
        </div>
        <div class="header__content">
            <h1><span>LIHAT</span> HASIL</h1>
            <p class="section__description">
                Ini adalah hasil dari kerja keras kamu ya! selamat, {{ Auth::user()->name }}!
            </p>
        </div>
    </header>

    <div class="py-12 bg-gray-50">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8"> {{-- max-w-2xl agar konten tidak terlalu lebar --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 md:p-8 bg-white border-b border-gray-200 text-center">

                <div class="mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Selamat, {{ $attempt->user->name }}!</h3>
                    <p class="mt-1 text-lg text-gray-600">Anda telah menyelesaikan kuis "{{ $attempt->kuis->judul }}".</p>
                </div>

                <div class="mb-8 p-6 bg-pink-600 rounded-lg text-white inline-block">
                    <p class="text-sm uppercase tracking-wider text-gray-900">Skor Akhir Kamu:</p>
                    {{-- Tambahkan kelas text-gray-900 di sini --}}
                    <p class="text-6xl font-extrabold text-gray-900">{{ $attempt->skor }}</p> 
                </div>

                <div class="text-sm text-gray-500">
                    <p>Kuis dikerjakan pada: {{ $attempt->created_at->format('d M Y, H:i') }}</p>
                    {{-- Anda bisa menambahkan detail lain di sini jika mau, misalnya: --}}
                    {{-- <p>Jumlah Soal: {{ $attempt->kuis->pertanyaan->count() }}</p> --}}
                    {{-- <p>Jumlah Jawaban Benar: [Hitung dari $attempt->attemptAnswers jika relasi diload] </p> --}}
                </div>

                <div class="mt-8">
                    <a href="{{ route('murid.kuis.index') }}" class="inline-flex items-center px-6 py-3 bg-pink-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-pink-500 active:bg-pink-700 focus:outline-none focus:border-pink-700 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Lihat Kuis Lainnya
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection