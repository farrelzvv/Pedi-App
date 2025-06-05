{{-- File: resources/views/murid/materi/show.blade.php --}}
@extends('layouts.custom_app') {{-- Menggunakan layout kustom baru --}}

@section('title', 'Materi Pembelajaran')

@section('content')

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $materi->judul }}</h3>
                    <div class="mb-4 text-sm text-gray-500">
                        <span class="font-semibold">Tipe:</span> {{ ucfirst(str_replace('_', ' ', $materi->tipe_materi ?? 'Teks')) }} |
                        <span class="font-semibold">Oleh:</span> {{ $materi->user->name ?? 'Guru' }} |
                        <span class="font-semibold">Dipublikasikan:</span> {{ $materi->created_at->format('d M Y, H:i') }}
                    </div>

                    @if($materi->deskripsi_singkat)
                        <p class="text-gray-700 italic mb-6 bg-gray-50 p-3 rounded-md">{{ $materi->deskripsi_singkat }}</p>
                    @endif

                    @if($materi->tipe_materi == 'teks' && $materi->konten)
                        <div class="prose max-w-none mt-4">
                            {!! $materi->konten !!}
                        </div>
                    @elseif($materi->tipe_materi == 'file' && $materi->file_path)
                        <div class="mt-4">
                            <p class="font-semibold mb-2">File Materi:</p>
                            <a href="{{ Storage::url($materi->file_path) }}" target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download/Lihat File ({{ basename($materi->file_path) }})
                            </a>
                        </div>
                    @elseif($materi->tipe_materi == 'video_link' && $materi->file_path)
                        <div class="mt-4">
                            <p class="font-semibold mb-2">Link Video/Sumber:</p>
                            <a href="{{ $materi->file_path }}" target="_blank" rel="noopener noreferrer"
                               class="text-blue-600 hover:underline break-all">{{ $materi->file_path }}</a>
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
                                <div class="aspect-w-16 aspect-h-9 mt-4">
                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                                </div>
                                @endif
                            @endif
                        </div>
                    @else
                        <p class="mt-4 text-gray-500">Konten untuk materi ini tidak tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection