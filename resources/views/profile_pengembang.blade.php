{{-- File: resources/views/profile/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Profil Pengembang')

{{-- Pastikan Font Awesome terhubung di layout utama Anda --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- Hubungkan file CSS khusus untuk halaman profil --}}
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@section('content')
<div class="profile-page-wrapper">

    {{-- Kartu Profil Pengembang --}}
    <div class="profile-card">
        {{-- Kolom Kiri: Foto & Email --}}
        <div class="profile-left-column">
            <div class="developer-photo-container">
                <img src="{{ asset('custom_ui/images/bila.jpg') }}" alt="Foto Profil Nabila Sayyida Rahma" onerror="this.onerror=null;this.src='https://placehold.co/200x250/fae8b4/3a3a3a?text=Foto';">
            </div>
            <div class="developer-contact">
                <i class="fa-solid fa-envelope"></i>
                <span>sayydr1108@gmail.com</span>
            </div>
        </div>

        {{-- Kolom Kanan: Judul & Info --}}
        <div class="profile-right-column">
            <h1>Profile Pengembang</h1>
            {{-- PERUBAHAN: Mengganti grid dengan list paragraf biasa --}}
            <div class="developer-info">
                <p><strong>Nama:</strong> Nabila Sayyida Rahma</p>
                <p><strong>Nim:</strong> 1107621274</p>
                <p><strong>Prodi:</strong> Pendidikan Guru Sekolah Dasar</p>
                <p><strong>Fakultas:</strong> Ilmu Pendidikan</p>
            </div>
        </div>
    </div>

    {{-- Kartu Referensi --}}
    <div class="references-card">
        <h2 class="references-title">Referensi</h2>
        <ul class="references-list">
            <li>Buku Panduan Guru Ilmu Pengetahuan Alam dan Sosial untuk SD kelas IV (Kementerian Pendidikan, Kebudayaan, Riset, Dan Teknologi Republik Indonesia, 2021) Penulis: Amalia Fitri, dkk.</li>
            <li>Buku Etis Bermedia Digital (Kementerian Komunikasi dan Informatika, 2021) penulis: Frida Kusumastuti, dkk.</li>
        </ul>
    </div>

</div>
@endsection
