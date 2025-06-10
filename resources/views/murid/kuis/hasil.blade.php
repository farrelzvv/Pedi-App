@extends('layouts.app')
@section('title', 'Hasil Kuis: ' . $attempt->kuis->judul)

@section('content')
<div class="content-wrapper py-12">
    <div class="card hasil-card">
        <h1 class="text-3xl font-bold font-heading">Hasil Kuis Selesai!</h1>
        <p class="text-lg text-secondary mb-4">Berikut adalah hasil pengerjaan kuis "{{ $attempt->kuis->judul }}" Anda.</p>

        <div class="score-circle {{ $attempt->skor >= 75 ? '' : 'failed' }}">
            <span class="score-value">{{ $attempt->skor }}</span>
            <span class="score-label">SKOR ANDA</span>
        </div>

        <div class="text-center">
            <p class="text-xl font-semibold mb-4">
                @if($attempt->skor >= 75)
                    Luar Biasa, {{ $attempt->user->name }}! Pertahankan prestasimu!
                @else
                    Jangan Menyerah, {{ $attempt->user->name }}! Coba lagi dan terus belajar!
                @endif
            </p>
            <a href="{{ route('murid.kuis.index') }}" class="kuis-card-button" style="max-width: 250px; margin: 1rem auto 0;">
                Coba Kuis Lain
            </a>
        </div>
    </div>
</div>
@endsection