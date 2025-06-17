{{-- File: resources/views/petunjuk.blade.php (VERSI PERBAIKAN) --}}
@extends('layouts.app')

@section('title', 'Petunjuk Penggunaan Media')

@section('content')
    <div class="content-wrapper py-12">

        
        <div class="card petunjuk-card">
            <h1 class="page-main-title">Petunjuk Penggunaan Media</h1>
            <h3 class="sub-heading">Perhatikan dan baca petunjuk dengan teliti!</h3>

            <ol class="petunjuk-list">
                {{-- Poin 1 --}}
                <li>
                    <span class="number-circle">1</span>
                    <div>
                        Menu yang terdapat di samping kiri dapat digunakan dengan tahapan: 
                        <ol class="sub-list">
                            <li>Membaca petunjuk penggunaan media.</li>
                            <li>Membaca materi.</li>
                            <li>Menyelesaikan 2 games</li>
                            <li>Melakukan Refleksi</li>
                            <li>Mengerjakan soal evaluasi yang berada di home.</li>
                        </ol>
                    </div>
                </li>

                {{-- Poin 2 --}}
                <li>
                    <span class="number-circle">2</span>
                    <div>
                        Setelah menyelesaikan 2 games siswa dapat masuk pada menu refleksi. Refleksi dapat digunakan untuk merespon atau melakukan komentar setelah guru mengajukan pertanyaan atau memberikan informasi.
                    </div>
                </li>
                {{-- Poin 2 --}}
                <li>
                    <span class="number-circle">3</span>
                    <div>
                        Soal evaluasi dikerjakan setelah menyelesaikan rangkaian pada menu refleksi. 
                    </div>
                </li>

                {{-- Poin 3 (DIUPDATE) --}}
                <li>
                    <span class="number-circle">4</span>
                    <div>
                        Seluruh siswa akan menggunakan website

                        {{-- Kalimat ini sekarang digabung ke dalam poin 3 --}}
                        <p> {{-- Diberi tag <p> dan margin atas agar ada spasi --}}
                            Setelah menggunakan media website, kembali ke home, klik gambar  <i class="ri-logout-box-r-line inline-icon"></i> untuk kembali ke log in, kemudian tutup website, dan matikan komputer kembali. 
                        </p>
                    </div>
                </li>
            </ol>

            {{-- Paragraf terpisah di bawah ini sudah dihapus --}}

        </div>

    </div>
@endsection