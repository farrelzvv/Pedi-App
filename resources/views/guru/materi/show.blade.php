{{-- File: resources/views/guru/materi/show.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detail Materi: <span class="italic">{{ $materi->judul }}</span>
            </h2>
            <a href="{{ route('guru.materi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Kembali ke Daftar Materi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8"> {{-- max-w-4xl agar konten bisa lebih lebar --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">

                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $materi->judul }}</h3>

                    <div class="mb-4 text-sm text-gray-500">
                        <span class="font-semibold">Tipe Materi:</span> {{ ucfirst(str_replace('_', ' ', $materi->tipe_materi ?? 'Teks')) }} | 
                        <span class="font-semibold">Status:</span> 
                        @if($materi->is_published)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Published
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Draft
                            </span>
                        @endif
                        | <span class="font-semibold">Dibuat:</span> {{ $materi->created_at->format('d M Y, H:i') }}
                        @if($materi->updated_at != $materi->created_at)
                            | <span class="font-semibold">Diperbarui:</span> {{ $materi->updated_at->format('d M Y, H:i') }}
                        @endif
                    </div>

                    @if($materi->deskripsi_singkat)
                        <p class="text-gray-700 italic mb-6">{{ $materi->deskripsi_singkat }}</p>
                    @endif

                    {{-- Tampilkan konten berdasarkan tipe materi --}}
                    @if($materi->tipe_materi == 'teks' && $materi->konten)
                        <div class="prose max-w-none mt-4">
                            {!! $materi->konten !!} {{-- Menggunakan {!! !!} jika konten adalah HTML, hati-hati XSS jika input tidak di-sanitize --}}
                        </div>
                    @elseif($materi->tipe_materi == 'file' && $materi->file_path)
                        <div class="mt-4">
                            <p class="font-semibold mb-2">File Materi:</p>
                            {{-- Pastikan file disimpan di storage/app/public dan php artisan storage:link sudah dijalankan --}}
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
                            {{-- Basic embed untuk YouTube jika URL-nya adalah URL watch YouTube --}}
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
                        <p class="mt-4 text-gray-500">Konten untuk materi ini tidak tersedia atau tipe materi tidak dikenali.</p>
                    @endif

                    <div class="mt-8 pt-4 border-t">
                        <a href="{{ route('guru.materi.edit', $materi->id) }}" class="text-sm text-blue-600 hover:underline">Edit Materi Ini</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection