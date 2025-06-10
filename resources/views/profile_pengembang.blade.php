{{-- File: resources/views/profile_pengembang.blade.php --}}
@extends('layouts.app')

@section('title', 'Profile Pengembang')

@section('content')
    <div class="content-wrapper py-12">
        <div class="profile-card">
            <h1 class="profile-card-title">Profile Pengembang</h1>

            <div class="profile-content">
                {{-- Bagian Foto --}}
                <div class="profile-picture-container">
                    <img src="{{ asset('custom_ui/images/bila.jpg') }}" alt="Foto Pengembang" class="profile-picture">
                    <div class="profile-contact">
                        <p><i class="ri-mail-line"></i> sayydr1108@gmail.com</p>
                    </div>
                </div>

                {{-- Bagian Detail Teks --}}
                <div class="profile-details">
                    <p><strong>Nama</strong>: Nabila Sayyida Rahma</p>
                    <p><strong>Nim</strong>: 1107621274</p>
                    <p><strong>Prodi</strong>: Pendidikan Guru Sekolah Dasar</p>
                    <p><strong>Fakultas</strong>: Ilmu Pendidikan</p>
                </div>
            </div>
        </div>
    </div>
@endsection