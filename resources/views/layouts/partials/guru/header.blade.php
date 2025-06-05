{{-- resources/views/layouts/partials/custom_header.blade.php --}}
<nav>
    <div class="nav__header">
        <div class="nav__logo">
            {{-- Logo bisa mengarah ke dashboard --}}
            <a href="{{ route('dashboard') }}">PEDI<span>APP</span></a> {{-- Sesuaikan nama & target logo --}}
        </div>
        <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
        </div>
    </div>
    <ul class="nav__links" id="nav-links">
        {{-- Sesuaikan link navigasi ini untuk aplikasi Anda --}}
        <li><a href="{{ route('dashboard') }}">Home</a></li> {{-- Mengarah ke dashboard --}}
        <li><a href="{{ route('guru.siswa.index') }}">Total siswa</a></li> {{-- Mengarah ke dashboard --}}
        <li><a href="{{ route('guru.materi.index') }}">Materi</a></li> {{-- Contoh link ke materi --}}
        <li><a href="{{ route('guru.kuis.index') }}">Kuis</a></li> {{-- Contoh link ke kuis --}}
        <li><a href="{{ route('refleksi.index') }}">Refleksi</a></li>
        {{-- Jika ada profile page: <li><a href="{{ route('profile.edit') }}">Profile Saya</a></li> --}}
    </ul>
    <div class="nav__btns">
        @auth
            {{-- Tampilkan nama pengguna dan tombol logout jika sudah login --}}
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="btn btn-logout">Logout</button>{{-- Anda mungkin perlu style untuk btn-logout --}}
            </form>
        @else
            {{-- Tombol untuk login/register jika belum login --}}
            <a href="{{ route('login') }}" class="btn">Login</a>
            {{-- <a href="{{ route('register') }}" class="btn btn-secondary">Register</a> --}}
        @endauth
    </div>
</nav>