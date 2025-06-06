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
            <h1><span>PEDI</span>-APP</h1>
            <p class="section__description">
                Selamat datang di website Pengenalan Etika Digital, {{ Auth::user()->name }}!
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="#about" class="btn">Tentang PEDI-APP</a> 
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>

    {{-- 2. Tujuan Pembelajaran (dari HTML Anda) --}}
    {{-- Jika Anda ingin ini dinamis dari DB, Anda perlu fetch data di route /dashboard dan loop di sini. --}}
    {{-- Untuk saat ini, kita gunakan konten statis yang sudah Anda sesuaikan di HTML. --}}
    <section class="section__container about__container" id="about">
        <div class="about__image">
            <img src="{{ asset('landing_page_assets/images/about.png') }}" alt="about" />
        </div>
        <div class="about__content">
            <h2 class="section__header">Tujuan Pembelajaran</h2>
            {{-- Menggunakan konten statis dari HTML Anda untuk sekarang: --}}
            <ul class="about__list">
                <li>
                    <span><i class="ri-focus-2-line"></i></span>
                    <div>
                    <h4>Mengerti Norma</h4>
                    <p class="section__description">
                        Peserta didik dapat mengidentifikasi definisi norma
                    </p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-slideshow-line"></i></span>
                    <div>
                    <h4>Adat Istiadat</h4>
                    <p class="section__description">
                        Peserta didik dapat mengidentifikasi definisi adat istiadat
                    </p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-search-eye-line"></i></span>
                    <div>
                    <h4>Indikasi Adat Istiadat</h4>
                    <p class="section__description">
                        Peserta didik dapat mengidentifikasi norma atau adat istiadat
                        yang berlaku di sekitarnya
                    </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="service" id="menu">
    <div class="section__container service__container">
        <h2 class="section__header">Menu Utama</h2>
        <div class="service__grid">
            {{-- Container (Kuis) --}}
            <a href="{{ route('murid.kuis.index') }}" class="service__card">
                <div><i class="ri-pencil-ruler-2-line"></i></div>
                <h4>Kuis</h4>
                <p class="section__description">Uji Kemampuan Belajar</p>
            </a>
            {{-- Container (Materi) --}}
            <a href="{{ route('murid.materi.index') }}" class="service__card">
                <div><i class="ri-computer-line"></i></div>
                <h4>Materi</h4>
                <p class="section__description">Akses Materi Pembelajaran</p>
            </a>
            {{-- Container (Games) --}}
            <a href="https://wordwall.net/resource/93017342" target="blink" class="service__card">
                <div><i class="ri-pages-line"></i></div>
                <h4>Games</h4>
                <p class="section__description">wordwall Drag & Drop</p>
            </a>
            {{-- Container (Games) --}}
            <a href="https://www.educaplay.com/learning-resources/23965219-yes_or_no.html" target="blink" class="service__card">
                <div><i class="ri-pages-line"></i></div>
                <h4>Games</h4>
                <p class="section__description">Educaplay yes or no</p>
            </a>
            {{-- Container (Refleksi) --}}
            <a href="{{ route('refleksi.index') }}" class="service__card">
                <div><i class="ri-layout-2-line"></i></div>
                <h4>Refleksi</h4>
                <p class="section__description">Diskusi bersama guru</p>
            </a>
        </div>
    </div>
</section>

    {{-- 4. Profile Pengembang (dari HTML Anda) --}}
    {{-- ID portfolio diubah menjadi profile agar cocok dengan link nav --}}
    <section class="portfolio" id="profile"> 
        <div class="section__container portfolio__container">
            <div class="portfolio__header">
                <h2 class="section__header">Profile Pengembang</h2>
            </div>
            <div class="portfolio__content">
                <div class="portfolio__image">
                    {{-- <div class="portfolio__image__content">
                        <div><h4>16</h4><p>Years<br />Experience</p></div>
                        <div><h4>250</h4><p>Types of<br />Courses</p></div>
                    </div> --}}
                    <img src="{{ asset('landing_page_assets/images/portfolio.jpg') }}" alt="portfolio" /> {{-- Ganti path gambar --}}
                </div>
                {{-- Menggunakan konten statis dari HTML Anda untuk sekarang: --}}
                <ul class="portfolio__list">
                    <li>
                        <span>01</span>
                        <div>
                            <h4>Nama</h4>
                            <p class="section__description">Nabila</p> {{-- Sesuai HTML Anda --}}
                        </div>
                    </li>
                    <li>
                        <span>02</span>
                        <div>
                            <h4>Nim</h4>
                            <p class="section__description">0110223099</p>
                        </div>
                    </li>
                    <li>
                        <span>03</span>
                        <div>
                            <h4>Prodi</h4>
                            <p class="section__description">Pendidikan Guru Sekolah Dasar</p>
                        </div>
                    </li>
                    <li>
                        <span>04</span>
                        <div>
                            <h4>Fakultas</h4>
                            <p class="section__description">Pendidikan</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection