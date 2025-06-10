{{-- File: resources/views/refleksi/_post_card.blade.php (VERSI BARU DINAMIS + STYLING) --}}
@php
    // Tentukan kelas berdasarkan peran pengguna
    $isGuru = $post->user->role == 0;
    $alignmentClass = $isGuru ? 'guru-post' : 'murid-post';
@endphp

<div class="refleksi-post {{ $alignmentClass }}">
    <div class="avatar">
        {{ strtoupper(substr($post->user->name, 0, 1)) }}
    </div>
    <div class="bubble">
        <div class="author">
            {{ $post->user->name }}
        </div>
        @if($post->konten_teks)
            <p class="content-text">{{ $post->konten_teks }}</p>
        @endif
        @if($post->gambar_path)
            <a href="{{ Storage::url($post->gambar_path) }}" target="_blank">
                <img src="{{ Storage::url($post->gambar_path) }}" alt="Gambar Refleksi" class="content-image">
            </a>
        @endif
        <div class="timestamp text-right mt-2">
            {{ $post->created_at->format('H:i') }}
        </div>
    </div>
</div>