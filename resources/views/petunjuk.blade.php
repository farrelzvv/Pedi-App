{{-- File: resources/views/petunjuk.blade.php --}}
@extends('layouts.app')

@section('title', 'Petunjuk Penggunaan')

@section('content')
    {{-- Wrapper halaman, gunakan kelas CSS kustom Anda --}}
    <div class="content-wrapper py-12">

        <header class="welcome-header" style="text-align: center; margin-bottom: 2rem;">
            <h1>Petunjuk Penggunaan</h1>
        </header>

        <div class="card petunjuk-card">
            <ol class="petunjuk-list">
                <li>
                    <div>
                        Perhatikan dan baca petunjuk dengan teliti!
                    </div>
                </li>
                <li>
                    <div>
                        Seluruh fitur yang ada di halaman menu dapat digunakan dengan tahapan:
                        <ol class="sub-list">
                            <li>Membaca petunjuk penggunaan terlebih dahulu</li>
                            <li>Membaca materi</li>
                            <li>Menyelesaikan 2 games</li>
                            <li>Melakukan Refleksi</li>
                            <li>Mengerjakan soal evaluasi yang berada di home.</li>
                        </ol>
                    </div>
                </li>
                <li>
                    <div>
                        Setelah menggunakan media website, kembali ke home, klik gambar <i class="ri-logout-box-r-line inline-icon"></i> untuk kembali ke log in, kemudian tutup website, dan matikan komputer kembali.
                    </div>
                </li>
            </ol>
        </div>

    </div>
@endsection