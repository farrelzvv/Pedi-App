{{-- File: resources/views/guru/materi/edit.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Materi: <span class="italic">{{ $materi->judul }}</span>
            </h2>
            <a href="{{ route('guru.materi.show', $materi->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Kembali ke Detail Materi
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('guru.materi.update', $materi->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Method spoofing untuk request PUT --}}

                        <div>
                            <label for="judul" class="block font-medium text-sm text-gray-700">{{ __('Judul Materi') }} <span class="text-red-500">*</span></label>
                            <input id="judul" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   type="text" name="judul" value="{{ old('judul', $materi->judul) }}" required autofocus />
                            @error('judul')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="deskripsi_singkat" class="block font-medium text-sm text-gray-700">{{ __('Deskripsi Singkat (Opsional)') }}</label>
                            <textarea id="deskripsi_singkat" name="deskripsi_singkat" rows="3"
                                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('deskripsi_singkat', $materi->deskripsi_singkat) }}</textarea>
                            @error('deskripsi_singkat')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <label for="tipe_materi" class="block font-medium text-sm text-gray-700">{{ __('Tipe Materi') }} <span class="text-red-500">*</span></label>
                            <select name="tipe_materi" id="tipe_materi" required
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="teks" {{ old('tipe_materi', $materi->tipe_materi) == 'teks' ? 'selected' : '' }}>Teks / Konten Langsung</option>
                                <option value="file" {{ old('tipe_materi', $materi->tipe_materi) == 'file' ? 'selected' : '' }}>Upload File (PDF, DOC, Gambar)</option>
                                <option value="video_link" {{ old('tipe_materi', $materi->tipe_materi) == 'video_link' ? 'selected' : '' }}>Link Video (Misal: YouTube)</option>
                            </select>
                            @error('tipe_materi')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="konten_field" class="mt-4">
                            <label for="konten" class="block font-medium text-sm text-gray-700">{{ __('Konten Materi (Teks)') }} <span id="konten_required_star" class="text-red-500" style="display:none;">*</span></label>
                            <textarea id="konten" name="konten" rows="10"
                                      class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('konten', $materi->konten) }}</textarea>
                            @error('konten')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="file_input_field" class="mt-4">
                            <label for="file_input" class="block font-medium text-sm text-gray-700">{{ __('Ganti File (Opsional)') }} <span id="file_required_star" class="text-red-500" style="display:none;">*</span></label>
                            @if($materi->tipe_materi == 'file' && $materi->file_path)
                                <p class="text-sm text-gray-500 mb-1">File saat ini: <a href="{{ Storage::url($materi->file_path) }}" target="_blank" class="text-blue-600 hover:underline">{{ basename($materi->file_path) }}</a></p>
                            @endif
                            <input id="file_input" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                   type="file" name="file_input">
                            <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti file. Tipe: PDF, DOC, JPG, PNG, MP4. Maks: 5MB.</p>
                            @error('file_input')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="url_input_field" class="mt-4">
                            <label for="url_input" class="block font-medium text-sm text-gray-700">{{ __('Link Video/Sumber Eksternal') }} <span id="url_required_star" class="text-red-500" style="display:none;">*</span></label>
                            <input id="url_input" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   type="url" name="url_input" value="{{ old('url_input', ($materi->tipe_materi == 'video_link' ? $materi->file_path : '')) }}" placeholder="https://youtube.com/watch?v=xxxxxx">
                            @error('url_input')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6">
                            <label for="is_published" class="flex items-center">
                                <input id="is_published" name="is_published" type="checkbox" value="1"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       {{ old('is_published', $materi->is_published) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-600">{{ __('Publikasikan Materi') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Update Materi') }}
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

            const kontenInput = document.getElementById('konten');
            const fileInput = document.getElementById('file_input'); // Nama input file di form
            const urlInput = document.getElementById('url_input'); // Nama input URL di form

            const kontenRequiredStar = document.getElementById('konten_required_star');
            const fileRequiredStar = document.getElementById('file_required_star');
            const urlRequiredStar = document.getElementById('url_required_star');

            function toggleFields() {
                const selectedType = tipeMateriSelect.value;

                kontenField.style.display = 'none';
                fileInputField.style.display = 'none';
                urlInputField.style.display = 'none';

                kontenRequiredStar.style.display = 'none';
                fileRequiredStar.style.display = 'none';
                urlRequiredStar.style.display = 'none';

                // Reset required attributes
                kontenInput.required = false;
                // fileInput.required = false; // File input tidak di-set required di sini karena opsional saat update
                urlInput.required = false;

                if (selectedType === 'teks') {
                    kontenField.style.display = '';
                    kontenRequiredStar.style.display = '';
                    kontenInput.required = true;
                } else if (selectedType === 'file') {
                    fileInputField.style.display = '';
                    // fileRequiredStar.style.display = ''; // Bintang hanya muncul jika file *wajib* diganti
                    // fileInput.required = true; // File tidak wajib diisi saat update, hanya jika ingin mengganti
                } else if (selectedType === 'video_link') {
                    urlInputField.style.display = '';
                    urlRequiredStar.style.display = '';
                    urlInput.required = true;
                }
            }

            tipeMateriSelect.addEventListener('change', toggleFields);
            toggleFields(); // Panggil saat load untuk inisialisasi tampilan field
        });
    </script>
</x-app-layout>