{{-- resources/views/refleksi/_post_card.blade.php --}}

{{-- Tentukan alignment berdasarkan peran pengguna --}}
@php
    $isGuru = $post->user->role == 0; // Asumsi role 0 adalah Guru
    $alignmentClasses = $isGuru ? 'justify-end' : 'justify-start';
    $bgColor = $isGuru ? 'bg-green-50' : 'bg-blue-50'; // Warna latar berbeda untuk Guru dan Murid
    $avatarOrder = $isGuru ? 'order-last ml-3' : 'mr-3';
    $textAlign = $isGuru ? 'text-right' : 'text-left'; // Untuk teks di dalam bubble jika diperlukan
    $bubbleCardAlignment = $isGuru ? 'items-end' : 'items-start';
@endphp

{{-- Wrapper untuk alignment kiri/kanan --}}
<div class="flex {{ $alignmentClasses }} mb-3">
    <div class="max-w-xl {{ $bgColor }} shadow-sm sm:rounded-lg {{ $level > 0 ? ($isGuru ? 'ml-auto ' : 'mr-auto ').'w-11/12' : 'w-full' }} {{ $level > 0 ? 'border' : '' }}">
        <div class="p-3 md:p-4 {{ $level > 0 ? 'border-gray-100' : 'border-gray-200' }} {{ $level > 0 ? 'rounded-md' : '' }}">
            <div class="flex {{ $isGuru ? 'flex-row-reverse' : 'flex-row' }} items-start space-x-3 {{ $isGuru ? 'space-x-reverse' : '' }}">
                {{-- Avatar Pengguna --}}
                <div class="flex-shrink-0">
                    <span class="inline-flex items-center justify-center h-10 w-10 rounded-full {{ $isGuru ? 'bg-green-200 text-green-700' : 'bg-blue-200 text-blue-700' }} font-semibold text-lg">
                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                    </span>
                </div>

                {{-- Konten Bubble --}}
                <div class="flex-grow {{ $textAlign }}">
                    <div class="text-sm {{ $textAlign }}">
                        <span class="font-semibold text-gray-900">{{ $post->user->name }}</span>
                        <span class="text-gray-500 ml-2 text-xs">{{ $post->created_at->diffForHumans() }}</span>
                        @if($isGuru) <span class="ml-1 px-2 py-0.5 text-xs font-semibold rounded-full bg-green-100 text-green-700">Guru</span> @endif
                        @if(!$isGuru) <span class="ml-1 px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">Murid</span> @endif
                    </div>
                    @if($post->konten_teks)
                        <p class="mt-1 text-gray-700 whitespace-pre-wrap {{ $textAlign }}">{{ $post->konten_teks }}</p>
                    @endif
                    @if($post->gambar_path)
                        <div class="mt-2 flex {{ $alignmentClasses }}"> {{-- Align gambar sesuai bubble --}}
                            <a href="{{ Storage::url($post->gambar_path) }}" target="_blank" class="inline-block">
                                <img src="{{ Storage::url($post->gambar_path) }}" alt="Gambar Refleksi" class="max-w-xs md:max-w-sm rounded-lg shadow object-cover">
                            </a>
                        </div>
                    @endif

                    <div class="mt-3 {{ $textAlign }}">
                        <button onclick="toggleReplyForm('reply-form-{{$post->id}}')" class="text-xs text-blue-600 hover:underline">Balas</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Balasan (Awalnya Tersembunyi) --}}
        <div id="reply-form-{{$post->id}}" class="p-3 md:p-4 border-t border-gray-200" style="display: none;">
            <form action="{{ route('refleksi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $post->id }}">
                <textarea name="konten_teks" rows="2" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Tulis balasan..."></textarea>
                <div class="mt-2">
                    <label for="gambar_input_reply_{{$post->id}}" class="block text-xs font-medium text-gray-700">Unggah Gambar (Opsional)</label>
                    <input type="file" name="gambar_input" id="gambar_input_reply_{{$post->id}}" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-1 file:px-2 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
                <div class="mt-2 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-400">Kirim Balasan</button>
                </div>
            </form>
        </div>

        {{-- Tampilkan Balasan (Replies) --}}
        @if ($post->replies && $post->replies->isNotEmpty() && $level < 3)
            <div class="pt-2 space-y-2">
                @foreach ($post->replies as $reply)
                    {{-- Untuk balasan, kita panggil lagi _post_card. Alignment balasan akan mengikuti parent-nya jika card dibungkus. --}}
                    {{-- Atau, jika ingin balasan selalu rata kiri di bawah parent, modifikasi di sini. --}}
                    {{-- Untuk saat ini, kita biarkan indentasi saja yang bekerja. --}}
                    <div class="{{ $level > -1 ? 'ml-'.(($level+1)*4).' md:ml-'.(($level+1)*6) : '' }}">
                         @include('refleksi._post_card', ['post' => $reply, 'level' => $level + 1])
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

{{-- Garis pemisah hanya untuk post utama (level 0) dan bukan yang terakhir --}}
@if($level == 0 && isset($loop) && !$loop->last) <hr class="my-4 md:my-6"> @endif

{{-- Script untuk toggle form balasan (pastikan hanya di-include sekali per halaman) --}}
@if(!isset($GLOBALS['refleksi_js_added']) && $level == 0 && isset($loop) && $loop->first)
    @php $GLOBALS['refleksi_js_added'] = true; @endphp
    @push('scripts')
    <script>
        if (typeof window.toggleReplyForm !== 'function') {
            window.toggleReplyForm = function(formId) {
                const form = document.getElementById(formId);
                if (form) {
                    form.style.display = form.style.display === 'none' ? 'block' : 'none';
                }
            }
        }
    </script>
    @endpush
@endif