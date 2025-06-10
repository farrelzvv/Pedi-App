{{-- File: resources/views/murid/materi/show.blade.php (VERSI BARU SESUAI DESAIN) --}}
@extends('layouts.app')

@section('title', $materi->judul)

@section('content')
    {{-- Wrapper halaman --}}
    <div class="content-wrapper">
        {{-- Menggunakan kelas .card yang background-color-nya sudah kita atur
             dan menambahkan kelas .materi-detail-card untuk styling spesifik --}}
        <div class="card materi-detail-card">

            {{-- Judul Materi --}}
            <h1 class="materi-title">{{ $materi->judul }}</h1>

            {{-- Info Meta (Oleh, Tanggal, Tipe) --}}
            <div class="materi-meta">
                <span>Tipe: {{ ucfirst(str_replace('_', ' ', $materi->tipe_materi ?? 'Teks')) }}</span> |
                <span>Oleh: {{ $materi->user->name ?? 'Guru' }}</span> |
                <span>Dipublikasikan: {{ $materi->created_at->format('d F Y') }}</span>
            </div>

            {{-- Deskripsi Singkat (jika ada) --}}
            @if($materi->deskripsi_singkat)
                <p class="italic text-gray-600 mb-6">{{ $materi->deskripsi_singkat }}</p>
            @endif


            {{-- Konten Utama Materi (dengan logika kondisional) --}}
            <div class="materi-content-body">
                @if($materi->tipe_materi == 'teks' && $materi->konten)
                    {!! $materi->konten !!}

                @elseif($materi->tipe_materi == 'file' && $materi->file_path)
                    <p class="mb-4">Materi ini tersedia dalam format file. Silakan unduh di bawah ini:</p>
                    <a href="{{ Storage::url($materi->file_path) }}" target="_blank" class="download-button">
                        <i class="ri-download-2-line"></i>
                        Download File ({{ basename($materi->file_path) }})
                    </a>

                @elseif($materi->tipe_materi == 'video_link' && $materi->file_path)
                    <p class="mb-4">Materi ini berupa link video. Silakan tonton di bawah ini:</p>
                    <a href="{{ $materi->file_path }}" target="_blank" rel="noopener noreferrer">{{ $materi->file_path }}</a>

                    {{-- Logika untuk embed video YouTube --}}
                    @if(Str::contains($materi->file_path, ['youtube.com/watch?v=', 'youtu.be/']))
                        @php
                            $videoId = null;
                            if (Str::contains($materi->file_path, 'youtube.com/watch?v=')) {
                                parse_str(parse_url($materi->file_path, PHP_URL_QUERY), $query);
                                $videoId = $query['v'] ?? null;
                            } elseif (Str::contains($materi->file_path, 'youtu.be/')) {
                                $videoId = Str::after($materi->file_path, 'youtu.be/');
                            }
                        @endphp
                        @if($videoId)
                        <div class="aspect-w-16 aspect-h-9 mt-4" style="position: relative; padding-bottom: 56.25%; height: 0;">
                            <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                        @endif
                    @endif

                @else
                    <p>Konten untuk materi ini tidak tersedia.</p>
                @endif
            </div>

        </div>
    </div>
@endsection