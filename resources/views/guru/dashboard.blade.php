{{-- File: resources/views/guru/dashboard.blade.php --}}
{{-- resources/views/dashboard.blade.php --}}
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
            <h1><span>PEDI</span>-APP</h1>
            <p class="section__description">
                Selamat datang di website Pengenalan Etika Digital, {{ Auth::user()->name }}!
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="#menu" class="btn">Jelajahi</a> 
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>

    <section class="service" id="menu">
    <div class="section__container service__container">
        <h2 class="section__header">Menu Utama</h2>
        
        {{-- Menu Guru --}}
        <div class="service__grid">

            {{-- Container Kembali ke Dashboard Murid --}}
            <a href="{{ route('dashboard') }}" class="service__card">
                <div><i class="ri-book-2-line"></i></div>
                <h4>Home</h4>
                <p class="section__description">Lihat Tampilan Murid</p>
            </a>

            {{-- Container (Total Siswa) --}}
            <a href="{{route('guru.siswa.index')}}" class="service__card">
                <div><i class="ri-group-line"></i></div>
                <h4>Total Siswa</h4>
                <p class="section__description">Lihat dan kelola data siswa.</p>
            </a>

            {{-- Container (Manajemen Kuis) --}}
            <a href="{{ route('guru.kuis.index') }}" class="service__card">
                <div><i class="ri-pencil-ruler-2-line"></i></div>
                <h4>Manajemen Kuis</h4>
                <p class="section__description">Buat, edit, atau hapus kuis.</p>
            </a>

            {{-- Container (Papan Refleksi) --}}
            <a href="{{ route('refleksi.index') }}" class="service__card">
                <div><i class="ri-layout-2-line"></i></div>
                <h4>Papan Refleksi</h4>
                <p class="section__description">Diskusi dan berbagi refleksi.</p>
            </a>
        </div>
    </div>
</section>
@endsection