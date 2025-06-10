{{-- File: resources/views/guru/dashboard.blade.php (VERSI BARU DENGAN KELAS KHUSUS) --}}
@extends('layouts.guru_app')

@section('title', 'Dashboard Guru')

@section('content')
<div class="content-wrapper py-12">

    {{-- Menggunakan kelas .guru-welcome-card yang baru --}}
    <div class="guru-welcome-card">
        <h1>Hallo {{ Auth::user()->name }},</h1>
        <p>Selamat datang di dashboard Guru Pengenalan Etika Digital.</p>
    </div>

    {{-- Menggunakan kelas .guru-stat-grid yang baru --}}
    <div class="guru-stat-grid">

        {{-- Kartu Manajemen Kuis --}}
        <a href="{{ route('guru.kuis.index') }}" class="guru-stat-card">
            <i class="ri-survey-line stat-icon"></i>
            <span class="stat-label">Manajemen Kuis</span>
        </a>

        {{-- Kartu Jumlah Siswa --}}
        <a href="{{-- route('#') --}}" class="guru-stat-card">
            <span class="stat-number">{{ $studentCount }}</span>
            <span class="stat-label">Total Siswa</span>
        </a>

    </div>
</div>
@endsection