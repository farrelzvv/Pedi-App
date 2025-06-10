@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="content-wrapper">
        <div class="card welcome-card">
            <header class="welcome-header">
                <h1>Hallo {{ Auth::user()->role == 0 ? Auth::user()->name : 'anak - anak' }},</h1>
                <p>Selamat datang di website Pengenalan Etika Digital</p>
            </header>
        </div>
    <div class="content-grid">
        <div class="card card-evaluasi">
            <a href="{{ route('murid.kuis.index') }}">
                {{-- Gambar baru ditambahkan di sini --}}
                <img src="{{ asset('custom_ui/images/evaluasi.png') }}" alt="Soal Evaluasi" class="card-icon">
                <h2>Soal Evaluasi</h2>
            </a>
        </div>
            <div class="card card-tujuan">
                <h2>Tujuan Pembelajaran</h2>
                <ol>
                    <li>Peserta didik dapat mengidentifikasi nilai norma dan adat istiadat yang berlaku di sekitarnya.</li>
                    <li>Peserta didik dapat mengartikan etika berinternet.</li>
                    <li>Peserta didik dapat melakukan komentar dengan sopan di dunia digital.</li>
                    <li>Peserta didik dapat menganalisis keterkaitan norma dengan etika digital dalam berinteraksi di dunia digital.</li>
                    <li>Peserta didik dapat mengenali konten negatif, memahami dampaknya, dan mengetahui cara menghindari serta menanganinya.</li>
                </ol>
            </div>
        </div>
    </div>
@endsection