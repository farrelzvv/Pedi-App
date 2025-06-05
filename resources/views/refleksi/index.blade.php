{{-- resources/views/refleksi/index.blade.php --}}
{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.custom_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'Dashboard Utama') {{-- Judul halaman dinamis --}}

@section('content')

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Pesan Sukses/Error (Pindahkan ke atas daftar post) --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-md">{{ session('success') }}</div>
            @endif
            @if($errors->has('konten_teks') || $errors->has('gambar_input')) {{-- Menampilkan error validasi utama di sini --}}
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-md">
                    @if($errors->has('konten_teks'))
                        <p>{{ $errors->first('konten_teks') }}</p>
                    @endif
                    @if($errors->has('gambar_input'))
                        <p>{{ $errors->first('gambar_input') }}</p>
                    @endif
                </div>
            @endif

            {{-- Daftar Post Refleksi (Sekarang di atas form input) --}}
            <div class="space-y-6 mb-8"> {{-- Tambahkan mb-8 untuk spasi sebelum form input --}}
                @forelse ($posts as $post)
                    {{-- Kita akan modifikasi _post_card untuk alignment nanti --}}
                    @include('refleksi._post_card', ['post' => $post, 'level' => 0])
                @empty
                    <div class="bg-white text-center p-6 shadow-sm sm:rounded-lg">
                        <p class="text-gray-500">Belum ada refleksi yang diposting. Jadilah yang pertama!</p>
                    </div>
                @endforelse

                @if(!$posts->isEmpty())
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
                @endif
            </div>

            {{-- Form untuk Post Refleksi Baru (Sekarang di bawah daftar post) --}}
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-3">Bagikan Refleksi Anda:</h3>
                    <form action="{{ route('refleksi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Input untuk parent_id bisa ditambahkan di sini jika form ini juga dipakai untuk balasan dari konteks lain --}}
                        {{-- Untuk post utama, parent_id tidak perlu --}}
                        <div class="mb-4">
                            <label for="konten_teks_new" class="sr-only">Tulis refleksi...</label>
                            <textarea name="konten_teks" id="konten_teks_new" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Tulis refleksi Anda di sini...">{{ old('konten_teks') }}</textarea>
                            {{-- Error konten_teks sudah ditampilkan di atas --}}
                        </div>
                        <div class="mb-4">
                            <label for="gambar_input_new" class="block text-sm font-medium text-gray-700">Unggah Gambar (Opsional)</label>
                            <input type="file" name="gambar_input" id="gambar_input_new" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            {{-- Error gambar_input sudah ditampilkan di atas --}}
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection