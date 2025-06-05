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
            <h1><span>KUIS</span> DIMULAI!</h1>
            <p class="section__description">
                Kerjakan dengan jujur ya!
            </p>
        </div>
    </header>

    <div class="py-12 bg-gray-50">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                {{-- Judul Kuis --}}
                <h2 class="text-center text-2xl font-bold text-pink-600 mb-8">Kuis: {{ $kuis->judul }}</h2>

                @if($pertanyaanKuis->isNotEmpty())
                    <form method="POST" action="{{route('murid.kuis.submit', $kuis->id)}}">
                        @csrf

                        <div class="space-y-8">
                            @foreach ($pertanyaanKuis as $index => $pertanyaan)
                                <div class="border-b pb-6 mb-6">
                                    <p class="font-semibold text-lg text-gray-800 mb-1">
                                        Pertanyaan {{ $index + 1 }}:
                                    </p>
                                    <p class="text-gray-700 mb-3">{{ $pertanyaan->teks_pertanyaan }}</p>

                                    @if($pertanyaan->pilihanJawaban && $pertanyaan->pilihanJawaban->isNotEmpty())
                                        <div class="space-y-2">
                                            @foreach ($pertanyaan->pilihanJawaban as $pilihan)
                                                <label for="jawaban_{{ $pertanyaan->id }}_{{ $pilihan->id }}" 
                                                       class="flex items-center p-3 border rounded-md hover:bg-gray-50 cursor-pointer transition-colors">
                                                    <input type="radio" 
                                                           name="jawaban[{{ $pertanyaan->id }}]" 
                                                           id="jawaban_{{ $pertanyaan->id }}_{{ $pilihan->id }}" 
                                                           value="{{ $pilihan->id }}" 
                                                           class="focus:ring-pink-500 h-4 w-4 text-pink-600 border-gray-300"
                                                           required>
                                                    <span class="ml-3 text-sm text-gray-700">{{ $pilihan->teks_pilihan }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                        @error("jawaban.{$pertanyaan->id}")
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    @else
                                        <p class="text-sm text-gray-500 italic">Tidak ada pilihan jawaban untuk pertanyaan ini.</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8 flex items-center justify-end">
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-pink-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-pink-500 active:bg-pink-700 focus:outline-none focus:border-pink-700 focus:ring ring-pink-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Kumpulkan Jawaban') }}
                            </button>
                        </div>
                    </form>
                @else
                    <p class="text-gray-600">Kuis ini belum memiliki pertanyaan. Silakan hubungi Guru Anda.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection