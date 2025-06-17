{{-- File: resources/views/murid/materi/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Materi: Etika Digital')

{{-- PENTING: Pastikan Font Awesome masih terhubung --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@section('content')
<div class="visual-content-wrapper">

    <div class="materi-visual-card">
        <h1 class="visual-title"><span>Etika digital Pada Norma dan Adat Istiadat</span></h1>

        <div class="visual-content-body">
            
            {{-- Konten yang sudah ada sebelumnya --}}
            <div class="visual-section">
                <h2 class="section-title">
                    <i class="fa-solid fa-circle icon-bullet"></i>
                    <span>Pengertian Norma</span>
                </h2>
                <p>
                    Norma adalah aturan atau pedoman yang dapat membantu kita, bagaimana seharusnya bersikap dan berperilaku di lingkungan masyarakat. Dengan kata lain norma adalah aturan yang mengatur tingkah laku manusia. Norma dibuat oleh manusia disesuaikan dengan keadaan masyarakat di suatu wilayah dengan memerhatikan nilai-nilai yang dijunjung pada kelompok masyarakat tersebut. Di era digital saat ini, terdapat salah satu norma yang mengatur manusia dalam bersikap dan berperilaku di dunia digital. Lebih jelasnya tertuang pada UU No. 11 tahun 2008 yaitu:
                </p>
                <ul class="visual-list">
                    <li>Pasal 26: Mengatur tentang perlindungan data pribadi, memberikan hak kepada individu untuk mengelola dan menghapus data pribadi yang tidak relevan.</li>
                    <li>Pasal 27: Melarang penyebaran konten yang mengandung unsur pencemaran nama baik, penghinaan, atau pornografi.</li>
                </ul>
            </div>

            <div class="visual-section pelanggaran-section">
                <div class="pelanggaran-text">
                    <p class="section-text-icon">
                        <i class="fa-solid fa-ban icon-ban"></i>
                        <span><strong>Contohnya pelanggaran:</strong> jika seseorang mengunggah foto orang lain tanpa izin dan menyebarkannya dengan tujuan merugikan orang tersebut, mereka bisa dikenakan hukuman seperti denda dan juga hukuman penjara sesuai dengan kesalahan yang diperbuatnya.</span>
                    </p>
                </div>
                <div class="pelanggaran-image">
                    <img src="{{ asset('custom_ui/images/contoh_pelanggaran.png') }}" alt="Ilustrasi pelanggaran digital">
                </div>
            </div>
            
            <div class="visual-section">
                <h2 class="section-title">
                    <i class="fa-solid fa-circle icon-bullet"></i>
                    <span>Pengertian Adat Istiadat</span>
                </h2>
                <p>
                    Adat istiadat adalah kebiasaan atau tradisi yang sudah lama ada dan masih dilakukan oleh sekelompok orang dalam masyarakat. Adat istiadat ini biasanya mencerminkan nilai-nilai dan hal-hal yang dianggap penting dalam budaya. Adat istiadat juga berlaku bagi masyarakat yang tinggal di wilayah tertentu. Contoh norma atau pun adat istiadat yang ada di lingkungan masyarakat:
                </p>
                <div class="adat-content-wrapper">
                    <div class="adat-image">
                        <img src="{{ asset('custom_ui/images/adat.png') }}" alt="Ilustrasi Adat Istiadat di Yogyakarta">
                        <span class="image-source">Source: portal berita pemerintah kota Yogyakarta.</span>
                    </div>
                    <div class="adat-list">
                        <ul class="visual-list">
                            <li>Mengucapkan permisi ketika memasuki rumah;</li>
                            <li>Mencium tangan kedua orang tua ketika hendak pergi;</li>
                            <li>Tidak meludah di sembarang tempat;</li>
                            <li>Tidak duduk selonjoran di depan orang lain;</li>
                            <li>Melakukan upacara adat pernikahan, kematian, maupun rasa syukur terhadap hasil bumi;</li>
                        </ul>
                    </div>
                </div>
                <p>
                    Adat istiadat tersebut menggambarkan bahwa manusia harus selalu bersikap sopan, santun, jujur, hormat serta toleransi anatra satu dengan yang lainnya. Semua itu dapat kita terapkan dalam bedigitalisasi.
                </p>
            </div>
            
            <div class="visual-section etiket-section">
                <div class="etiket-text">
                    <h2 class="section-title">
                        <i class="fa-solid fa-circle icon-bullet"></i>
                        <span>Etika Berinternet (Etiket)</span>
                    </h2>
                    <p>
                        Etika berinternet adalah aturan dan cara yang sebaiknya dilakukan saat menggunakan internet. Bertanggung jawab terhadap waktu saat bermain alat teknologi termasuk dalam etika berinternet. Waktu yang ideal untuk anak - anak bermain internet adalah 1 - 2 jam sehari. Penggunaan media digital atau alat teknologi yang terlalu banyak dapat menyebabkan kelelahan mata dan gangguan penglihatan, serta semakin sedikit waktu yang tersedia untuk belajar, yang dapat mengganggu proses belajar dan menurunkan nilai akademik.
                    </p>
                </div>
                <div class="etiket-image">
                    <img src="{{ asset('custom_ui/images/etiket.png') }}" alt="Ilustrasi etika berinternet">
                </div>
            </div>

            <div class="visual-section menghindari-section">
                <div class="menghindari-text">
                    <p><strong>Berikut hal-hal yang perlu dihindari saat menggunakan alat teknologi adalah:</strong></p>
                    <ol class="visual-ol">
                        <li>
                            <div>
                                <strong>Mengirim dan Membuat Konten Negatif</strong><br>
                                Hindari mengunggah hal-hal yang bisa membuat orang lain merasa sedih atau marah, seperti gambar atau video yang menyakiti perasaan orang lain.
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>Memberikan Informasi Pribadi</strong><br>
                                Jangan mengunggah informasi pribadi, seperti alamat rumah, nomor telepon, atau informasi keuangan. Sebaliknya tidak juga menggunakan identitas orang lain.
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>Memberikan dan Membuat Berita Palsu</strong><br>
                                Jangan menyebarkan berita atau informasi yang tidak benar. Pastikan untuk memeriksa kebenaran informasi sebelum membagikannya, agar tidak menyesatkan orang lain, tidak menyembunyikan fakta saat berbicara atau berbagi informasi, dan tidak mengirimkan pesan palsu atau menipu orang lain dengan informasi yang salah.
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong>Menghina atau Mengganggu Orang lain</strong><br>
                                Jangan mengunggah komentar yang menghina atau mengganggu orang lain dengan menghindari penggunaan kata-kata kasar dan mengandung kekerasan (SARA), dan tidak menghargai perasaan orang lain. Sebaliknya, harus selalu bersikap ramah, serta menghargai karya orang lain.
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="menghindari-image">
                    <img src="{{ asset('custom_ui/images/menghindari.png') }}" alt="Ilustrasi hal yang harus dihindari">
                </div>
            </div>

            <div class="info-box-yellow">
                <div class="info-box-header">
                    <div class="info-box-icon-container">
                        <img src="{{ asset('custom_ui/images/konten-negatif.png') }}" alt="Ikon Konten Negatif" class="info-box-image">
                    </div>
                    <h3>Apa Itu Konten Negatif?</h3>
                </div>
                <p>
                    Konten negatif bisa berupa berita buruk, gambar atau video yang tidak pantas, ujaran kebencian, atau informasi yang menyesatkan. Konten ini dapat membuat kita merasa sedih, marah, atau takut.
                </p>
                <p class="mt-4">
                    <strong>Contoh Konten Negatif:</strong>
                </p>
                <ul class="visual-list">
                    <li>Berita tentang kekerasan atau kejahatan yang bisa membuat kita merasa tidak aman.</li>
                    <li>Komentar atau postingan yang menghina atau merendahkan orang lain berdasarkan ras, agama, atau latar belakang.</li>
                    <li>Gambar atau video yang tidak sesuai untuk anak-anak, seperti gambar kekerasan atau pornografi.</li>
                </ul>

                {{-- =============================================== --}}
                {{-- BAGIAN BARU DITAMBAHKAN DI SINI --}}
                {{-- =============================================== --}}
                <div class="visual-section nilai-section">
                    <div class="nilai-image">
                        {{-- Ganti 'konten_negatif.png' dengan nama file yang benar jika berbeda --}}
                        <img src="{{ asset('custom_ui/images/konten_negatif.png') }}" alt="Ilustrasi penerapan nilai di dunia digital">
                        <span class="image-source">Source: Canva.ai</span>
                    </div>
                    <div class="nilai-text">
                        <p>
                            Menerapan nilai - nilai yang terkandung dari berbagai macam adat istiadat di Indonesia dapat dilakukan di dunia digital. Seperti berprilaku sopan, jujur, bertanggung jawab, hormat serta toleransi. Dengan melakukan hal positif ketika menggunakan alat teknologi kita dapat berperan membuat lingkungan digital yang aman dan nyaman.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
