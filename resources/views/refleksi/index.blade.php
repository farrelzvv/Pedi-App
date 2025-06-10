{{-- File: resources/views/refleksi/index.blade.php (VERSI BARU DINAMIS) --}}
@extends('layouts.app')

@section('title', 'Refleksi')

@section('content')
    <div class="content-wrapper">
        <div class="refleksi-card"> {{-- Menggunakan kelas baru dari CSS --}}
            <div class="refleksi-header">
                Berikan Tanggapanmu Disini
            </div>

            {{-- Area untuk menampilkan komentar dari database --}}
            <div class="refleksi-content">
                @if(session('success'))
                    <div class="p-3 text-sm text-green-700 bg-green-100 rounded-md">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    <div class="p-3 text-sm text-red-700 bg-red-100 rounded-md">{{ $errors->first() }}</div>
                @endif

                @forelse($posts as $post)
                    {{-- Memanggil partial view untuk setiap post --}}
                    @include('refleksi._post_card', ['post' => $post])
                @empty
                    <p class="text-center text-gray-500">Belum ada refleksi. Jadilah yang pertama berkomentar!</p>
                @endforelse
            </div>

            {{-- Area input untuk komentar baru --}}
            <div class="refleksi-input-area">
                <form action="{{ route('refleksi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="konten_teks" class="refleksi-input" placeholder="Tulis komentar kamu di sini...">
                    {{-- Untuk upload gambar bisa ditambahkan di sini jika diperlukan kembali --}}
                    <button type="submit" class="refleksi-submit-button">
                        <i class="ri-send-plane-fill"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection