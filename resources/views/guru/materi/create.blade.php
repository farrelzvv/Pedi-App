{{-- File: resources/views/guru/materi/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tambah Materi Baru') }}
            </h2>
            <a href="{{ route('guru.materi.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Kembali ke Daftar Materi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('guru.materi.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="judul" class="block font-medium text-sm text-gray-700">{{ __('Judul Materi') }} <span class="text-red-500">*</span></label>
                            <input id="judul" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   type="text" name="judul" value="{{ old('judul') }}" required autofocus />
                            @error('judul')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="deskripsi_singkat" class="block font-medium text-sm text-gray-700">{{ __('Deskripsi Singkat (Opsional)') }}</label>
                            <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3"
                                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('deskripsi_singkat') }}</textarea>
                            @error('deskripsi_singkat')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="tipe_materi" class="block font-medium text-sm text-gray-700">{{ __('Tipe Materi') }} <span class="text-red-500">*</span></label>
                            <select name="tipe_materi" id="tipe_materi" required
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="teks" {{ old('tipe_materi') == 'teks' ? 'selected' : '' }}>Teks / Konten Langsung</option>
                                <option value="file" {{ old('tipe_materi') == 'file' ? 'selected' : '' }}>Upload File (PDF, DOC, Gambar)</option>
                                <option value="video_link" {{ old('tipe_materi') == 'video_link' ? 'selected' : '' }}>Link Video (Misal: YouTube)</option>
                            </select>
                            @error('tipe_materi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="konten_field" class="mt-4" style="{{ old('tipe_materi', 'teks') == 'teks' ? '' : 'display:none;' }}">
                            <label for="konten" class="block font-medium text-sm text-gray-700">{{ __('Konten Materi (Teks)') }} <span id="konten_required_star" class="text-red-500">*</span></label>
                            <textarea id="konten" name="konten" rows="10"
                                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('konten') }}</textarea>
                            @error('konten')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="file_input_field" class="mt-4" style="{{ old('tipe_materi') == 'file' ? '' : 'display:none;' }}">
                            <label for="file_input" class="block font-medium text-sm text-gray-700">{{ __('Upload File') }} <span id="file_required_star" class="text-red-500" style="display:none;">*</span></label>
                            <input id="file_input" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                   type="file" name="file_input">
                            <p class="mt-1 text-xs text-gray-500">Tipe file yang diizinkan: PDF, DOC, DOCX, JPG, PNG, MP4. Maks: 5MB.</p>
                            @error('file_input')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="url_input_field" class="mt-4" style="{{ old('tipe_materi') == 'video_link' ? '' : 'display:none;' }}">
                            <label for="url_input" class="block font-medium text-sm text-gray-700">{{ __('Link Video/Sumber Eksternal') }} <span id="url_required_star" class="text-red-500" style="display:none;">*</span></label>
                            <input id="url_input" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   type="url" name="url_input" value="{{ old('url_input') }}" placeholder="https://youtube.com/watch?v=xxxxxx">
                            @error('url_input')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label for="is_published" class="flex items-center">
                                <input id="is_published" name="is_published" type="checkbox" value="1"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       {{ old('is_published') ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">{{ __('Publikasikan Materi (Bisa dilihat Murid)') }}</span>
                            </label>
                            @error('is_published')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Simpan Materi') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipeMateriSelect = document.getElementById('tipe_materi');
            const kontenField = document.getElementById('konten_field');
            const fileInputField = document.getElementById('file_input_field');
            const urlInputField = document.getElementById('url_input_field');
            const kontenRequiredStar = document.getElementById('konten_required_star');
            const fileRequiredStar = document.getElementById('file_required_star');
            const urlRequiredStar = document.getElementById('url_required_star');

            function toggleFields() {
                const selectedType = tipeMateriSelect.value;
                kontenField.style.display = selectedType === 'teks' ? '' : 'none';
                fileInputField.style.display = selectedType === 'file' ? '' : 'none';
                urlInputField.style.display = selectedType === 'video_link' ? '' : 'none';

                // Atur bintang required berdasarkan tipe
                kontenRequiredStar.style.display = selectedType === 'teks' ? '' : 'none';
                fileRequiredStar.style.display = selectedType === 'file' ? '' : 'none';
                urlRequiredStar.style.display = selectedType === 'video_link' ? '' : 'none';

                // Set required attribute on inputs
                document.getElementById('konten').required = selectedType === 'teks';
                document.getElementById('file_input').required = selectedType === 'file';
                document.getElementById('url_input').required = selectedType === 'video_link';
            }

            tipeMateriSelect.addEventListener('change', toggleFields);
            toggleFields(); // Panggil saat load untuk inisialisasi
        });
    </script>
</x-app-layout>