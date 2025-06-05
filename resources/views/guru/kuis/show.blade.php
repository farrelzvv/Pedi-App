{{-- File: resources/views/guru/kuis/show.blade.php --}}
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
            <h1>{{ $kuis->judul }}</h1>
            <p class="section__description">
                {{ $kuis->deskripsi ?: 'Tidak ada deskripsi.' }}
            </p>
            <p class="section__description">
                Dibuat oleh: {{ $kuis->user->name }} pada {{ $kuis->created_at->format('d M Y, H:i') }}
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="{{ route('guru.kuis.pertanyaan.create', $kuis->id) }}" class="btn">Tambah Pertanyaan</a> 
                <a href="{{ route('guru.kuis.index') }}" class="btn btn-outline ml-2">Kembali</a>
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>

    <section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Section Daftar Pertanyaan --}}
        <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">

                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Daftar Pertanyaan Kuis</h2>

                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                    Daftar Pertanyaan ({{ $questions->count() }})
                </h3>

                @if(session('success_pertanyaan'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">
                        {{ session('success_pertanyaan') }}
                    </div>
                @endif

                @if($questions->isEmpty())
                    <p class="text-gray-600">Belum ada pertanyaan untuk kuis ini.</p>
                    <p class="mt-2">
                        <a href="{{ route('guru.kuis.pertanyaan.create', $kuis->id) }}" class="text-blue-600 hover:underline">
                            Klik tombol "Tambah Pertanyaan Baru" di atas untuk mulai menambahkan.
                        </a>
                    </p>
                @else
                    <div class="space-y-4">
                        @foreach ($questions as $index => $question)
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-start">
                                    <div class="flex-grow">
                                        <p class="font-semibold text-gray-800">
                                            {{ $index + 1 }}. {{ $question->teks_pertanyaan }}
                                            <span class="text-xs font-normal text-gray-500">({{ $question->tipe_pertanyaan }})</span>
                                        </p>

                                        {{-- Daftar Pilihan Jawaban --}}
                                        @if($question->pilihanJawaban && $question->pilihanJawaban->isNotEmpty())
                                            <ul class="list-disc list-inside pl-5 mt-2 text-sm text-gray-700 space-y-1">
                                                @foreach($question->pilihanJawaban as $pilihan)
                                                    <li class="{{ $pilihan->is_benar ? 'font-semibold text-green-700' : '' }}">
                                                        {{ $pilihan->teks_pilihan }}
                                                        @if($pilihan->is_benar)
                                                            <span class="text-xs font-bold text-green-500 ml-1">(Jawaban Benar)</span>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-xs text-gray-500 mt-1 italic">Belum ada pilihan jawaban untuk pertanyaan ini.</p>
                                        @endif
                                    </div>
                                    <div class="flex-shrink-0 flex space-x-2 ml-4">
                                        <a href="{{route('guru.kuis.pertanyaan.edit', [$kuis->id, $question->id])}}" class="text-sm text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('guru.kuis.pertanyaan.destroy', ['kui' => $kuis->id, 'pertanyaan' => $question->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

    </div>
</section>
@endsection