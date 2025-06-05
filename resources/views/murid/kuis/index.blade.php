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
            <h1><span>DAFTAR</span> KUIS</h1>
            <p class="section__description">
                Pilih kuis yang ingin kamu coba untuk kerjakan!, {{ Auth::user()->name }}!
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="{{ route('dashboard') }}" class="btn btn-outline ml-2">Kembali</a>
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>

    <div class="py-12 bg-gray-100">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-center text-2xl font-bold text-pink-600 mb-8">Pilih Kuis</h2>

        @if($quizzes && $quizzes->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($quizzes as $kuis)
                    <div class="bg-white overflow-hidden shadow-md rounded-lg flex flex-col">
                        <div class="p-6 flex-grow">
                            <h4 class="text-lg font-bold text-pink-600 mb-2">{{ $kuis->judul }}</h4>
                            <p class="text-sm text-gray-600 mb-3">
                                {{ Str::limit($kuis->deskripsi ?: 'Tidak ada deskripsi.', 100) }}
                            </p>
                            <p class="text-xs text-gray-500">
                                Jumlah Pertanyaan: {{ $kuis->pertanyaan_count }}
                            </p>
                        </div>
                        <div class="px-6 pb-4 pt-2 border-t border-gray-200">
                            <a href="{{ route('murid.kuis.mulai', $kuis->id) }}" 
                               class="inline-block w-full text-center px-4 py-2 bg-pink-500 text-white rounded-md hover:bg-pink-600 transition font-semibold">
                                Mulai Kuis
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $quizzes->links() }}
            </div>
        @else
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-center">
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md inline-block">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 3.001-1.742 3.001H4.42c-1.53 0-2.493-1.667-1.743-3.001l5.58-9.92zM10 13a1 1 0 110-2 1 1 0 010 2zm-1.75-5.75a.75.75 0 00-1.5 0v3.5a.75.75 0 001.5 0v-3.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                Saat ini belum ada kuis yang tersedia. Silakan cek kembali nanti!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection