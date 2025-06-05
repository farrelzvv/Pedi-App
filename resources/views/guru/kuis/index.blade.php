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
            <h1><span>KUIS</span>-MURID</h1>
            <p class="section__description">
                Buat dan Atur Kuis sesuai kebutuhan!
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="{{ route('guru.kuis.create') }}" class="btn">Buat Kuis Baru</a> 
                <a href="{{ route('guru.dashboard') }}" class="btn btn-outline ml-2">Kembali</a>
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>
    
    <section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Daftar Kuis</h2>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                @if($quizzes->isEmpty())
                    <p class="text-gray-600 text-center">Anda belum membuat kuis apapun.</p>
                    <p class="mt-2 text-center">
                        <a href="{{ route('guru.kuis.create') }}" class="text-blue-600 hover:underline">
                            Klik di sini untuk membuat kuis pertama Anda!
                        </a>
                    </p>
                @else
                    <div class="space-y-4">
                        @foreach ($quizzes as $kuis)
                            <div class="border rounded-lg p-4 shadow">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $kuis->judul }}</h3>
                                        <p class="text-sm text-gray-600 mt-1">
                                            {{ Str::limit($kuis->deskripsi ?: 'Tidak ada deskripsi.', 150) }}
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Dibuat pada: {{ $kuis->created_at->format('d M Y, H:i') }}
                                            ({{ $kuis->pertanyaan->count() }} Pertanyaan)
                                        </p>
                                    </div>
                                    <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 md:space-x-2 mt-2 md:mt-0 items-start md:items-center">
                                        <a href="{{ route('guru.kuis.hasilPengerjaan', $kuis->id) }}" class="text-sm text-purple-600 hover:text-purple-900 px-3 py-1 border border-purple-300 rounded-md hover:bg-purple-50 whitespace-nowrap">Lihat Hasil</a>
                                        <a href="{{ route('guru.kuis.show', $kuis->id) }}" class="text-sm text-indigo-600 hover:text-indigo-900 px-3 py-1 border border-indigo-300 rounded-md hover:bg-indigo-50 whitespace-nowrap">Atur Soal</a>
                                        <a href="{{ route('guru.kuis.edit', $kuis->id) }}" class="text-sm text-green-600 hover:text-green-900 px-3 py-1 border border-green-300 rounded-md hover:bg-green-50 whitespace-nowrap">Edit Kuis</a>
                                        <form action="{{ route('guru.kuis.destroy', $kuis->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kuis ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:text-red-900 px-3 py-1 border border-red-300 rounded-md hover:bg-red-50 whitespace-nowrap">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $quizzes->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection