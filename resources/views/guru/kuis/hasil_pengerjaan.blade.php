{{-- File: resources/views/guru/kuis/hasil_pengerjaan.blade.php --}}
{{-- File: resources/views/guru/siswa/index.blade.php --}}
@extends('layouts.guru_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'Dashboard Utama') {{-- Judul halaman dinamis --}}

@section('content')
    <header class="section__container header__container" id="home">
        <div class="header__image">
            {{-- Ganti path gambar sesuai dengan lokasi di public/landing_page_assets/ --}}
            <img src="{{ asset('landing_page_assets/images/header.png') }}" alt="header" />
        </div>
        <div class="header__content">
            <h1><span>HASIL</span>-NILAI</h1>
            <p class="section__description">
                Lihat Hasil Nilai Kuis Murid, {{ Auth::user()->name }}!
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
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
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Daftar Hasil Nilai Kuis</h2>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if($attempts->isEmpty())
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-md">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 3.001-1.742 3.001H4.42c-1.53 0-2.493-1.667-1.743-3.001l5.58-9.92zM10 13a1 1 0 110-2 1 1 0 010 2zm-1.75-5.75a.75.75 0 00-1.5 0v3.5a.75.75 0 001.5 0v-3.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    Belum ada siswa yang mengerjakan kuis ini.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Murid</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu Pengerjaan</th>
                                    {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($attempts as $index => $attempt)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $attempts->firstItem() + $index }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $attempt->user->name ?? 'User tidak ditemukan' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span class="font-semibold">{{ $attempt->skor }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $attempt->created_at->format('d M Y, H:i') }}
                                        </td>
                                        {{-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Link Paginasi --}}
                    <div class="mt-6">
                        {{ $attempts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection