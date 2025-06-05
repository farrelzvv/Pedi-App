{{-- resources/views/layouts/partials/custom_footer.blade.php --}}
<footer>
    <div class="section__container footer__container">
        <div class="footer__col">
            <div class="footer__logo">
                {{-- Sesuaikan logo dan link jika perlu --}}
                <a href="{{ route('dashboard') }}">PEDI<span>APP</span></a>
            </div>
            <p class="section__description">
                Website Pengenalan Etika Digital untuk pembelajaran interaktif.
                {{-- Ganti deskripsi ini --}}
            </p>
            {{-- Hapus atau sesuaikan bagian sosial media jika tidak relevan --}}
            {{-- <h3>Follow Us</h3>
            <ul class="footer__socials"> ... </ul> --}}
        </div>
        <div class="footer__col">
            <h4>Navigasi Cepat</h4>
            <ul class="footer__links">
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('murid.materi.index') }}">Materi</a></li>
                <li><a href="{{ route('murid.kuis.index') }}">Kuis</a></li>
                <li><a href="{{ route('refleksi.index') }}">Refleksi</a></li>
                {{-- <li><a href="#">Terms of Users</a></li> --}}
            </ul>
        </div>
        <div class="footer__col">
            <h4>Bantuan</h4>
            <ul class="footer__links">
                <li><a href="#">Pusat Bantuan</a></li>
                <li><a href="#">FAQs</a></li>
                {{-- <li><a href="#">Privacy Policy</a></li> --}}
            </ul>
        </div>
        <div class="footer__col">
            <h4>Kontak Kami</h4>
            <ul class="footer__links">
                <li><a><span><i class="ri-mail-fill"></i></span> info@pediapp.com</a></li>
                {{-- Sesuaikan detail kontak --}}
            </ul>
        </div>
    </div>
    <div class="footer__bar">
        Copyright © {{ date('Y') }} PEDI-APP. All rights reserved. {{-- Copyright dinamis --}}
    </div>
</footer>