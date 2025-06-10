@extends('layouts.app')
@section('title', 'Daftar Kuis')

@section('content')
<div class="content-wrapper py-12">
    <header class="welcome-header mb-8">
        <h1>Daftar Kuis Tersedia</h1>
        <p>Pilih kuis di bawah ini untuk menguji pemahamanmu!</p>
    </header>

    @if($quizzes->isEmpty())
        <div class="card text-center p-8">
            <p>Belum ada kuis yang tersedia saat ini. Cek kembali nanti ya!</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($quizzes as $kuis)
                <div class="kuis-card">
                    <div class="kuis-card-body">
                        <h3 class="kuis-card-title">{{ $kuis->judul }}</h3>
                        <p class="kuis-card-description">{{ Str::limit($kuis->deskripsi, 80) }}</p>
                        <div class="kuis-card-meta">
                            <span><i class="ri-question-line"></i> {{ $kuis->pertanyaan_count }} Pertanyaan</span>
                        </div>
                    </div>
                    <div class="kuis-card-footer">
                        <a href="{{ route('murid.kuis.mulai', $kuis->id) }}" class="kuis-card-button">
                            Kerjakan Sekarang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $quizzes->links() }}
        </div>
    @endif
</div>
@endsection