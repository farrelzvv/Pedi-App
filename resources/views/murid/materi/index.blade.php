{{-- File: resources/views/murid/materi/index.blade.php (VERSI FINAL DENGAN KONTEN LENGKAP) --}}
@extends('layouts.app')

@section('title', 'Materi: Etika Digital')

@section('content')
    <div class="content-wrapper py-12">

        <div class="card materi-detail-card">
            <h1 class="materi-title">Materi Etika Digital pada Norma dan Adat Istiadat</h1>

            {{-- Konten Utama Materi --}}
            <div class="materi-content-body">

                {{-- Pengertian Norma --}}
                <h2 class="text-2xl font-bold mt-6 mb-3">Pengertian Norma</h2>
                <p class="mb-4">
                    Norma adalah aturan atau pedoman yang dapat membantu kita, bagaimana seharusnya bersikap dan berperilaku di lingkungan masyarakat.  Ada dua jenis norma: 
                </p>
                <ol class="list-decimal list-inside space-y-4">
                    <li>
                        <strong>Norma Formal</strong>
                        <p class="pl-6 mt-1">
                            Norma formal adalah aturan yang telah ditetapkan dan harus diikuti oleh semua orang.  Jika kita melanggar aturan ini, kita bisa mendapatkan hukuman.  Seperti hukum undang undang yang melarang menyebar ataupun membuat informasi negatif di media sosial, yang ada didalam UU No. 11 tahun 2008 tentang informasi dan transaksi elektronik. Pasal 26 mengatur tentang perlindungan data pribadi, memberikan hak kepada individu untuk mengelola dan menghapus data pribadi yang tidak relevan.  Pasal 27 melarang penyebaran konten yang mengandung unsur pencemaran nama baik, penghinaan, atau pornografi. 
                            <br><strong>Contoh pelanggaran:</strong> jika seseorang mengunggah foto orang lain tanpa izin dan menyebarkannya dengan tujuan merugikan orang tersebut, mereka bisa dikenakan hukuman seperti denda dan juga hukuman penjara sesuai dengan kesalahan yang diperbuatnya. 
                        </p>
                    </li>
                    <li>
                        <strong>Norma Informal</strong>
                        <p class="pl-6 mt-1">
                            Norma informal adalah aturan yang tidak tertulis, tetapi diikuti oleh masyarakat.  Aturan ini biasanya berkaitan dengan sopan santun dan etika sosial.  Misalnya, kita harus menghormati orang tua, tidak berbicara kasar, dan membantu teman yang membutuhkan.  Norma ini juga berlaku ketika kita sedang bermain gawai dan internet. 
                            <ul class="list-disc list-inside pl-6 mt-2">
                                <li><strong>Norma Kesopanan:</strong> mengajarkan untuk berbicara serta berprilaku sopan kepada orang lain.  Dengan bersikap sopan, kita menunjukkan rasa hormat kepada orang lain. </li>
                                <li><strong>Norma Sosial:</strong> mengatur bagaimana kita berinteraksi dengan orang lain dalam situasi sosial. </li>
                                <li><strong>Norma Agama:</strong> mengajarkan kita untuk menghormati keyakinan dan praktik keagamaan.  Ini membantu kita menjaga hubungan baik dengan Tuhan dan sesama. </li>
                            </ul>
                        </p>
                    </li>
                </ol>

                {{-- Pengertian Adat Istiadat --}}
                <h2 class="text-2xl font-bold mt-8 mb-3">Pengertian Adat Istiadat</h2>
                <p class="mb-4">
                    Adat istiadat adalah kebiasaan atau tradisi yang sudah lama ada dan masih dilakukan oleh sekelompok orang dalam masyarakat.  Adat istiadat ini biasanya mencerminkan nilai-nilai dan hal-hal yang dianggap penting dalam budaya, seperti: 
                </p>
                <ul class="list-disc list-inside pl-6">
                    <li>Tradisi Pernikahan Adat</li>
                    <li>Ritual keagamaan</li>
                    <li>Aturan berpakaian dalam acara tertentu</li>
                    <li>Larangan tertentu, seperti larangan bermain di luar rumah pada waktu tertentu.</li>
                </ul>

                {{-- Etika Berinternet --}}
                <h2 class="text-2xl font-bold mt-8 mb-3">Etika Berinternet (Etiket)</h2>
                <p class="mb-4">
                    Etika berinternet adalah aturan dan cara yang sebaiknya dilakukan saat menggunakan internet.  Apa saja yang tidak boleh dilakukan saat menggunakan alat teknologi: 
                </p>
                <ol class="list-decimal list-inside space-y-2">
                    <li><strong>Mengirim dan membuat Konten Negatif:</strong> Hindari mengunggah hal-hal yang bisa membuat orang lain merasa sedih atau marah, seperti gambar atau video yang menyakiti perasaan orang lain.</li>
                    <li><strong>Memberikan Informasi Pribadi:</strong> Jangan mengunggah informasi pribadi, seperti alamat rumah, nomor telepon, atau informasi keuangan.  Ini penting untuk menjaga keamanan dan privasi kamu. </li>
                    <li><strong>Menyebarkan dan Membuat Berita Palsu:</strong> Jangan menyebarkan berita atau informasi yang tidak benar.  Pastikan untuk memeriksa kebenaran informasi sebelum membagikannya, agar tidak menyesatkan orang lain. </li>
                    <li><strong>Menghina atau Mengganggu Orang lain:</strong> Jangan mengunggah komentar yang menghina atau mengganggu orang lain.  Selalu bersikap baik dan hormati perasaan orang lain saat berkomunikasi. </li>
                </ol>

                {{-- Konten Negatif --}}
                <h3 class="text-xl font-bold mt-6 mb-3">Konten Negatif</h3>
                <p class="mb-2">
                    Konten negatif bisa berupa berita buruk, gambar atau video yang tidak pantas, ujaran kebencian, atau informasi yang menyesatkan.  Konten ini dapat membuat kita merasa sedih, marah, atau takut.  Contoh Konten Negatif: 
                </p>
                <ul class="list-disc list-inside pl-6">
                    <li>Berita tentang kekerasan atau kejahatan yang bisa membuat kita merasa tidak aman. </li>
                    <li>Komentar atau postingan yang menghina atau merendahkan orang lain berdasarkan ras, agama, atau latar belakang. </li>
                    <li>Gambar atau video yang tidak sesuai untuk anak-anak, seperti gambar kekerasan atau pornografi. </li>
                </ul>

                {{-- Bertransaksi secara digital --}}
                <h3 class="text-xl font-bold mt-6 mb-3">Bertransaksi secara Digital</h3>
                <p class="mb-2">
                    Saat bertransaksi digital, ada beberapa hal penting yang harus dilakukan agar transaksi berjalan dengan aman dan lancar, seperti: 
                </p>
                <ol class="list-decimal list-inside space-y-2">
                    <li><strong>Menggunakan situs yang aman dan terpercaya.</strong> Cek apakah alamat situs dimulai dengan "https://" dan ada ikon gembok di sebelah kiri Alamat untuk menunjukkan bahwa situs tersebut aman untuk digunakan. </li>
                    <li><strong>Jangan berbagi informasi Pribadi</strong> seperti nomor telepon, alamat rumah, atau nomor rekening bank kepada orang yang tidak kita kenal.  Informasi ini bisa disalahgunakan. </li>
                    <li><strong>Periksa ulasan dan rating</strong> sebelum membeli barang atau jasa untuk membantu kita mengetahui apakah penjual tersebut terpercaya atau tidak. </li>
                    <li><strong>Gunakan metode pembayaran yang Aman</strong>, seperti menggunakan dompet digital atau kartu kredit yang memiliki perlindungan.  Hindari mentransfer uang langsung ke rekening orang yang tidak kita kenal. </li>
                    <li><strong>Simpan bukti Transaksi</strong> setelah melakukan transaksi, simpan bukti pembayaran atau konfirmasi yang kita terima. </li>
                    <li><strong>Periksa barang yang diterima</strong> setelah barang sampai.  Jika ada yang salah atau barangnya rusak, segera hubungi penjual untuk menyelesaikan masalah. </li>
                    <li><strong>Diskusikan dengan orang tua atau guru</strong> jika kita merasa ragu atau tidak yakin tentang suatu transaksi.  Karena mereka bisa memberikan saran dan membantu kita membuat keputusan yang tepat. </li>
                </ol>

                {{-- Nilai-nilai Tradisional --}}
                <h2 class="text-2xl font-bold mt-8 mb-3">Nilai - nilai Tradisional yang dapat diterapkan</h2>
                <p class="mb-4">
                    Adat istiadat di Indonesia menerapakan masyarakatnya untuk selalu menghormati orang lain.  Menghormati orang lain juga perlu dilakukan di dunia digital ketika kita sedang bermain di handphone dan alat teknologi lainnya.  Contoh prilaku yang tidak menghormati orang lain serta perlu dihindari, seperti: 
                </p>
                <ul class="list-disc list-inside pl-6 space-y-1">
                    <li>Bullying (mengganggu orang lain). </li>
                    <li>Menghina orang lain. </li>
                    <li>Menyebarkan informasi yang bisa merugikan orang lain. </li>
                    <li>Tidak menghargai perasaan orang lain. </li>
                </ul>
                <p class="mt-4 mb-2">
                    Budaya di Indonesia mengajarkan kita untuk berbicara dengan sopan dan santun. Seperti: 
                </p>
                 <ul class="list-disc list-inside pl-6 space-y-1">
                    <li>Menghindari kata-kata kasar. </li>
                    <li>Berbicara dengan cara yang ramah. </li>
                    <li>Menggunakan kata "maaf"</li>
                    <li>Menghargai karya orang lain.</li>
                    <li>Menggunakan emoji dan tanda baca yang tepat.</li>
                </ul>
                <p class="mt-4 mb-2">
                    Kita perlu bertanggung jawab dalam melakukan segala sesuatu.  Terlebih saat menggunakan internet dan alat teknologi, seperti: 
                </p>
                <ul class="list-disc list-inside pl-6 space-y-1">
                    <li>Bertanggung jawab atas apa yang kita posting dan sebarkan. </li>
                    <li>Meminta maaf setelah melakukan kesalahan</li>
                    <li>Bertanggung jawab terhadap waktu dengan bermain internet 1-2 jam sehari.</li>
                </ul>
                <p class="mt-4 mb-2">
                    Kejujuran berarti selalu berkata dan berbuat benar, tidak berbohong atau menyembunyikan sesuatu.  Dalam dunia digital, kita harus selalu jujur dalam berkomunikasi.  Seperti:
                </p>
                <ul class="list-disc list-inside pl-6 space-y-1">
                    <li>Tidak berbohong atau menyebarkan informasi yang tidak baik kepada orang lain. </li>
                    <li>Tidak menggunakan identitas orang lain.</li>
                    <li>Selalu mengakui jika melakukan kesalahan dalam berkomunikasi.</li>
                    <li>Tidak menyembunyikan fakta saat berbicara atau berbagi informasi. </li>
                    <li>Tidak mengirimkan pesan palsu atau menipu orang lain dengan informasi yang salah. </li>
                </ul>

            </div>
        </div>
    </div>
@endsection