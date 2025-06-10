{{-- File: resources/views/guru/kuis/show.blade.php (VERSI BARU DENGAN STYLE KUSTOM) --}}
@extends('layouts.guru_app') {{-- Menggunakan layout khusus Guru --}}

@section('title', 'Detail Kuis: ' . $kuis->judul)

@section('content')
<div class="content-wrapper py-12">

    {{-- Header Halaman --}}
    <header class="page-header">
        <div>
            <h1 class="page-title">{{ $kuis->judul }}</h1>
            <p class="mt-1 text-sm text-gray-500">
                Kelola pertanyaan dan lihat hasil untuk kuis ini.
            </p>
        </div>
        <a href="{{ route('guru.kuis.pertanyaan.create', $kuis->id) }}" class="action-button">
            <i class="ri-add-line"></i>
            <span>Tambah Pertanyaan</span>
        </a>
    </header>

    @if(session('success_pertanyaan'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
            {{ session('success_pertanyaan') }}
        </div>
    @endif

    {{-- Container Daftar Pertanyaan --}}
    <div class="question-list-container">
        @forelse ($questions as $index => $question)
            <div class="question-card">
                <div class="question-card-header">
                    <p class="question-card-text">
                        Soal #{{ $index + 1 }}: {{ $question->teks_pertanyaan }}
                    </p>
                    <div class="table-actions"> {{-- Menggunakan kelas dari tabel untuk konsistensi --}}
                        <a href="{{ route('guru.kuis.pertanyaan.edit', ['kui' => $kuis->id, 'pertanyaan' => $question->id]) }}" class="link-edit" title="Edit Pertanyaan">Edit</a>
                        <form action="{{ route('guru.kuis.pertanyaan.destroy', ['kui' => $kuis->id, 'pertanyaan' => $question->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="link-delete" title="Hapus Pertanyaan">Hapus</button>
                        </form>
                    </div>
                </div>
                <div class="question-card-body">
                    @if($question->pilihanJawaban->isNotEmpty())
                        <ul class="answer-list">
                            @foreach ($question->pilihanJawaban as $pilihan)
                                {{-- Menambahkan kelas 'is-correct' jika jawaban benar --}}
                                <li class="{{ $pilihan->is_benar ? 'is-correct' : '' }}">
                                    @if($pilihan->is_benar)
                                        <i class="ri-checkbox-circle-fill correct-icon"></i>
                                    @else
                                        <i class="ri-checkbox-blank-circle-line wrong-icon"></i>
                                    @endif
                                    <span>{{ $pilihan->teks_pilihan }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500 italic">Belum ada pilihan jawaban untuk pertanyaan ini.</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="card text-center p-8">
                <p class="text-gray-500">Kuis ini belum memiliki pertanyaan.</p>
                <a href="{{ route('guru.kuis.pertanyaan.create', $kuis->id) }}" class="text-blue-600 hover:underline mt-2 inline-block">Tambahkan pertanyaan pertama Anda</a>
            </div>
        @endforelse
    </div>
</div>
@endsection