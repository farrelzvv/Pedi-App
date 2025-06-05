{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.custom_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'Dashboard Utama') {{-- Judul halaman dinamis --}}

@section('content')
    {{-- 1. Ini Info Website (Hero Section dari HTML Anda) --}}
    <header class="section__container header__container" id="home">
        <div class="header__image">
            {{-- Ganti path gambar sesuai dengan lokasi di public/landing_page_assets/ --}}
            <img src="{{ asset('landing_page_assets/images/header_materi.png') }}" alt="header" />
        </div>
        <div class="header__content">
            <h1>Materi Etika digital</h1>
            <p class="section__description"> yang diintegrasikan pada Norma dan Adat Isitiadat
            </p>
            <div class="header__btns">
                {{-- Link ini bisa diarahkan ke section 'Tujuan Pembelajaran' di bawah jika masih satu halaman,
                     atau ke halaman lain jika dipisah. Untuk sekarang, kita buat link ke section ID. --}}
                <a href="#norma" class="btn">Pelajari</a> 
                {{-- <a href="#">
                    <span><i class="ri-play-fill"></i></span>
                    Check Video 
                </a> --}}
            </div>
        </div>
    </header>
    
    <section class="portfolio" id="norma">
        <div class="section__container portfolio__container">
            <div class="portfolio__header">
                <h2 class="section__header">
                    Pengertian Norma Dan Berbagai Jenis-Jenisnya
                </h2>
                <p class="section__description">
                    Norma adalah aturan atau pedoman yang dapat membantu kita, bagaimana 
                    seharusnya bersikap dan berperilaku di lingkungan masyarakat. 
                    Ada dua jenis norma
                </p>
            </div>
            <div class="portfolio__content">
                <div class="portfolio__image">
                    <img src="{{ asset('landing_page_assets/images/norma.png') }}" alt="norma" />
                </div>
                <ul class="portfolio__list">
                    <li>
                        <span>01</span>
                        <div>
                            <h4>Norma Formal</h4>
                            <p class="section__description">
                                Norma formal adalah aturan yang telah ditetapkan dan harus diikuti oleh semua orang. 
                                Jika kita melanggar aturan ini, kita bisa mendapatkan hukuman. 
                                Seperti hukum undang – undang yang melarang menyebar ataupun membuat informasi negatif di media sosial, yang
                                ada didalam UU No. 11 tahun 2008 tentang informasi dan transaksi elektronik. 
                                <br>
                                <br>
                                <ul>
                                    <li>- Pasal 26: Mengatur tentang perlindungan data pribadi, memberikan hak kepada individu untuk mengelola dan menghapus data pribadi yang tidak relevan.</li>
                                    <li>- Pasal 27: Melarang penyebaran konten yang mengandung unsur pencemaran nama baik, penghinaan, atau pornografi.</li>
                                </ul>
                                <br>
                                Contoh pelanggaran: jika seseorang mengunggah foto orang lain tanpa izin dan menyebarkannya dengan tujuan merugikan orang tersebut, mereka bisa dikenakan hukuman seperti denda dan juga hukuman penjara sesuai dengan kesalahan yang diperbuatnya.
                            </p>
                        </div>
                    </li>
                    <li>
                        <span>02</span>
                        <div>
                            <h4>Norma Informal</h4>
                            <p class="section__description">
                                Norma informal adalah aturan yang tidak tertulis, tetapi diikuti oleh masyarakat. 
                                Aturan ini biasanya berkaitan dengan sopan santun dan etika sosial. 
                                <br>
                                <br>
                                Misalnya, kita harus menghormati orang tua, tidak berbicara kasar, dan membantu 
                                teman yang membutuhkan. Norma ini juga berlaku ketika kita sedang bermain gawai dan internet.
                                <ul>
                                    <li>- Norma kesopanan adalah norma yang mengajarkan untuk berbicara serta berprilaku sopan kepada orang lain. Dengan bersikap sopan, kita menunjukkan rasa hormat kepada orang lain.</li>
                                    <li>- Norma Sosial adalah norma yang mengatur bagaimana kita berinteraksi dengan orang lain dalam situasi sosial. </li>
                                    <li>- Norma Agama adalah norma yang mengajarkan kita untuk menghormati keyakinan dan praktik keagamaan. Ini membantu kita menjaga hubungan baik dengan Tuhan dan sesama.</li>
                                </ul>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

        <section class="section__container about__container" id="konten_negatif">
        <div class="about__image">
            <img src="{{ asset('landing_page_assets/images/internet.png') }}" alt="konten negatif" /> {{-- Anda mungkin ingin mengganti gambar ini --}}
        </div>
        <div class="about__content">
            <h2 class="section__header">Etika Berinternet (Etiket)</h2>
            <p class="section__description">
                Etika berinternet adalah aturan dan cara yang sebaiknya dilakukan saat menggunakan internet. Apasaja yang tidak boleh dilakukan saat menggunakan alat teknologi
            </p>
            <br>
            <ul class="about__list">
                <li>
                    <span><i class="ri-alert-line"></i></span>
                    <div>
                      <h4>Mengirim dan membuat Konten Negatif</h4>
                      <p class="section__description">Hindari mengunggah hal-hal yang bisa membuat orang lain merasa sedih atau marah, seperti gambar atau video yang menyakiti perasaan orang lain.</p>
                    </div>
                  </li>
                  <li>
                    <span><i class="ri-alert-line"></i></span>
                    <div>
                      <h4>Memberikan Informasi Pribadi</h4>
                      <p class="section__description">Jangan mengunggah informasi pribadi, seperti alamat rumah, nomor telepon, atau informasi keuangan. Ini penting untuk menjaga keamanan dan privasi kamu.</p>
                    </div>
                  </li>
                  <li>
                    <span><i class="ri-alert-line"></i></span>
                    <div>
                      <h4>Menyebarkan dan Membuat Berita Palsu</h4>
                        <p class="section__description">Gambar atau video yang tidak sesuai untuk anak-anak, seperti gambar kekerasan atau pornografi.Jangan menyebarkan berita atau informasi yang tidak benar. Pastikan untuk memeriksa kebenaran informasi sebelum membagikannya, agar tidak menyesatkan orang lain</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="section__container about__container" id="adat_istiadat">
        <div class="about__image">
            <img src="{{ asset('landing_page_assets/images/adat.png') }}" alt="adat istiadat" /> {{-- Anda mungkin ingin mengganti gambar ini --}}
        </div>
        <div class="about__content">
            <h2 class="section__header">Pengertian Adat Istiadat</h2>
            <p class="section__description">
                Adat istiadat adalah kebiasaan atau tradisi yang sudah lama ada dan masih dilakukan oleh sekelompok orang dalam masyarakat. 
                Adat istiadat ini biasanya mencerminkan nilai-nilai dan hal-hal yang dianggap penting dalam budaya, seperti:
            </p>
            <br>
            <ul class="about__list">
                <li>
                    <span><i class="ri-check-double-line"></i></span> {{-- Mengganti ikon agar sesuai dengan list --}}
                    <div>
                        <h4>Tradisi Pernikahan Adat</h4>
                    </div>
                </li>
                <li>
                    <span><i class="ri-check-double-line"></i></span>
                    <div>
                        <h4>Ritual keagamaan</h4>
                    </div>
                </li>
                <li>
                    <span><i class="ri-check-double-line"></i></span>
                    <div>
                        <h4>Aturan berpakaian dalam acara tertentu</h4>
                    </div>
                </li>
                <li>
                    <span><i class="ri-check-double-line"></i></span>
                    <div>
                        <h4>Larangan tertentu, seperti larangan bermain di luar rumah pada waktu tertentu.</h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="section__container about__container" id="konten_negatif">
        <div class="about__image">
            <img src="{{ asset('landing_page_assets/images/negatif.png') }}" alt="konten negatif" /> {{-- Anda mungkin ingin mengganti gambar ini --}}
        </div>
        <div class="about__content">
            <h2 class="section__header">Konten Negatif</h2>
            <p class="section__description">
                Konten negatif bisa berupa berita buruk, gambar atau video yang tidak pantas, ujaran kebencian, atau informasi yang menyesatkan. 
                Konten ini dapat membuat kita merasa sedih, marah, atau takut.
            </p>
            <br>
            <ul class="about__list">
                <li>
                    <span><i class="ri-alert-line"></i></span>
                    <div>
                        <p class="section__description">Berita tentang kekerasan atau kejahatan yang bisa membuat kita merasa tidak aman.</p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-alert-line"></i></span>
                    <div>
                        <p class="section__description">Komentar atau postingan yang menghina atau merendahkan orang lain berdasarkan ras, agama, atau latar belakang.</p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-alert-line"></i></span>
                    <div>
                        <p class="section__description">Gambar atau video yang tidak sesuai untuk anak-anak, seperti gambar kekerasan atau pornografi.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="portfolio" id="transaksi_digital">
        <div class="section__container portfolio__container">
            <div class="portfolio__header">
                <h2 class="section__header">Bertransaksi Secara Digital</h2>
                <p class="section__description">
                    Saat bertransaksi digital, ada beberapa hal penting yang harus dilakukan agar transaksi berjalan dengan aman dan lancar, seperti:
                </p>
            </div>
            <div class="portfolio__content">
                 <div class="portfolio__image">
                    <img src="{{ asset('landing_page_assets/images/interaksi.png') }}" alt="transaksi digital" /> {{-- Anda mungkin ingin mengganti gambar ini --}}
                </div>
                <ul class="portfolio__list">
                    <li>
                        <span><i class="ri-shield-check-line"></i></span>
                        <div>
                            <h4>Gunakan Situs Aman</h4>
                            <p class="section__description">Menggunakan situs yang aman dan terpercaya. Cek apakah alamat situs dimulai dengan "https://" dan ada ikon gembok di sebelah kiri Alamat untuk menunjukkan bahwa situs tersebut aman untuk digunakan.</p>
                        </div>
                    </li>
                    <li>
                        <span><i class="ri-lock-password-line"></i></span>
                        <div>
                            <h4>Jaga Informasi Pribadi</h4>
                            <p class="section__description">Jangan berbagi informasi Pribadi seperti nomor telepon, alamat rumah, atau nomor rekening bank kepada orang yang tidak kita kenal. Informasi ini bisa disalahgunakan.</p>
                        </div>
                    </li>
                    <li>
                        <span><i class="ri-star-line"></i></span>
                        <div>
                            <h4>Periksa Ulasan</h4>
                            <p class="section__description">Periksa ulasan dan rating sebelum membeli barang atau jasa untuk membantu kita mengetahui apakah penjual tersebut terpercaya atau tidak.</p>
                        </div>
                    </li>
                     <li>
                        <span><i class="ri-bank-card-line"></i></span>
                        <div>
                            <h4>Metode Pembayaran Aman</h4>
                            <p class="section__description">Gunakan metode pembayaran yang Aman, seperti menggunakan dompet digital atau kartu kredit yang memiliki perlindungan. Hindari mentransfer uang langsung ke rekening orang yang tidak kita kenal.</p>
                        </div>
                    </li>
                     <li>
                        <span><i class="ri-file-list-3-line"></i></span>
                        <div>
                            <h4>Simpan Bukti Transaksi</h4>
                            <p class="section__description">Simpan bukti Transaksi setelah melakukan transaksi, simpan bukti pembayaran atau konfirmasi yang kita terima.</p>
                        </div>
                    </li>
                     <li>
                        <span><i class="ri-dropbox-line"></i></span>
                        <div>
                            <h4>Periksa Barang</h4>
                            <p class="section__description">Periksa barang yang diterima setelah barang sampai. Jika ada yang salah atau barangnya rusak, segera hubungi penjual untuk menyelesaikan masalah.</p>
                        </div>
                    </li>
                     <li>
                        <span><i class="ri-chat-smile-2-line"></i></span>
                        <div>
                            <h4>Diskusikan dengan Orang Terpercaya</h4>
                            <p class="section__description">Diskusikan dengan orang tua atau guru jika kita merasa ragu atau tidak yakin tentang suatu transaksi. Karena mereka bisa memberikan saran dan membantu kita membuat keputusan yang tepat.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section__container about__container" id="nilai_tradisional">
        <div class="about__image">
            <img src="{{ asset('landing_page_assets/images/nilai_adat.png') }}" alt="nilai tradisional" /> {{-- Anda mungkin ingin mengganti gambar ini --}}
        </div>
        <div class="about__content">
            <h2 class="section__header">Nilai - nilai Tradisional yang Dapat Diterapkan</h2>
            <ul class="about__list">
                <li>
                    <span><i class="ri-user-heart-line"></i></span>
                    <div>
                        <h4>Menghormati Orang Lain</h4>
                        <p class="section__description">Adat istiadat di Indonesia menerapakan masyarakatnya untuk selalu menghormati orang lain. Menghormati orang lain juga perlu dilakukan di dunia digital ketika kita sedang bermain di handphone dan alat teknologi lainnya. Contoh prilaku yang tidak menghormati orang lain serta perlu dihindari, seperti: Bullying (mengganggu orang lain), Menghina orang lain, Menyebarkan informasi yang bisa merugikan orang lain, Tidak menghargai perasaan orang lain.</p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-speak-line"></i></span>
                    <div>
                        <h4>Kesopanan dalam Berkomunikasi</h4>
                        <p class="section__description">Budaya di Indonesia mengajarkan kita untuk berbicara dengan sopan dan santun. Seperti: Menghindari kata-kata kasar, Berbicara dengan cara yang ramah, Menggunakan kata “maaf”, Menghargai karya orang lain, Menggunakan emoji dan tanda baca yang tepat.</p>
                    </div>
                </li>
                <li>
                    <span><i class="ri-group-2-line"></i></span>
                    <div>
                        <h4>Tanggung Jawab Sosial</h4>
                        <p class="section__description">Kita perlu bertanggung jawab dalam melakukan segala sesuatu. Terlebih saat menggunakan internet dan alat teknologi, seperti: Bertanggung jawab atas apa yang kita posting dan sebarkan, Meminta maaf setelah melakukan kesalahan, Bertanggung jawab terhadap waktu dengan bermain internet 1 – 2 jam sehari.</p>
                    </div>
                </li>
                 <li>
                    <span><i class="ri-heart-add-line"></i></span>
                    <div>
                        <h4>Kejujuran</h4>
                        <p class="section__description">Kejujuran berarti selalu berkata dan berbuat benar, tidak berbohong atau menyembunyikan sesuatu. Dalam dunia digital, kita harus selalu jujur dalam berkomunikasi. Seperti: Tidak berbohong atau menyebarkan informasi yang tidak baik kepada orang lain, Tidak menggunakan identitas orang lain, Selalu mengakui jika melakukan kesalahan dalam berkomunikasi, Tidak menyembunyikan fakta saat berbicara atau berbagi informasi, Tidak mengirimkan pesan palsu atau menipu orang lain dengan informasi yang salah.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection