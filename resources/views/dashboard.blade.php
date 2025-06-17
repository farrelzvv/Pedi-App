@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
    {{-- Bagian 1: Banner Selamat Datang --}}
    <div class="card welcome-card">
        <header class="welcome-header">
            {{-- Menggunakan sapaan "anak-anak" sesuai desain untuk dashboard murid --}}
            <h1>Hallo anak - anak,</h1>
            <p>Selamat datang di website Pengenalan Etika Digital</p>
        </header>
    </div>

    {{-- Bagian 2: Konten Utama (Grid) --}}
    <div class="content-grid">
        {{-- Kolom Kiri: Tujuan Pembelajaran (lebih lebar) --}}
        <div class="card card-tujuan">
            <h2>Tujuan Pembelajaran</h2>
            <ol>
                {{-- Menggunakan daftar statis dari kode Anda --}}
                <li>Melalui media website, peserta didik dapat mengartikan norma dan adat istiadat, serta etika berinternet dengan benar. (C2)</li>
                <li>Melalui media website, peserta didik dapat mendemonstrasikan cara berinteraksi di ruang digital dengan sopan. (C3)</li>
                <li>Melalui media website, peserta didik dapat mengenali konten negatif dan cara bertransaksi secara digital dengan baik. (C4)</li>
            </ol>
        </div>

        {{-- Kolom Kanan: Soal Evaluasi (lebih ramping) --}}
        <div class="card-evaluasi">
            {{-- Pastikan route 'murid.kuis.index' sudah ada --}}
            <a href="#">
                {{-- Menggunakan ikon dari gambar Anda. Pastikan file evaluasi.png ada --}}
                <img src="{{ asset('custom_ui/images/evaluasi.png') }}" alt="Soal Evaluasi" class="card-icon">
                <h2>Soal Evaluasi</h2>
            </a>
        </div>
    </div>

    {{-- BAGIAN BARU: Peta Materi Modul --}}
    <div class="modul-map-container">
        <img src="{{ asset('custom_ui/images/modul.png') }}" alt="Peta Materi IPAS" class="modul-map-image">
    </div>
    
</div>
@endsection
