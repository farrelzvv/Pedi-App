{{-- File: resources/views/layouts/partials/guru/header.blade.php (VERSI SEDERHANA) --}}

<aside class="sidebar">
    <div class="sidebar-top">
        <div class="sidebar-logo">
            <div class="logo-icon-box">
                <i class="ri-book-open-line"></i>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul>
                {{-- Link ke Dashboard Guru --}}
                <li class="nav-item {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('guru.dashboard') }}" title="Dashboard Guru">
                        <i class="ri-dashboard-line"></i>
                        <span>Guru</span>
                    </a>
                </li>

                {{-- Link ke Manajemen Kuis --}}
                <li class="nav-item {{ request()->routeIs('guru.kuis.*') ? 'active' : '' }}">
                    <a href="{{ route('guru.kuis.index') }}" title="Manajemen Kuis">
                        <i class="ri-survey-line"></i>
                        <span>Kuis</span>
                    </a>
                </li>

                {{-- Link ke Refleksi (umum) --}}
                <li class="nav-item {{ request()->routeIs('refleksi.index') ? 'active' : '' }}">
                    <a href="{{ route('refleksi.index') }}" title="Papan Refleksi">
                        <i class="ri-question-answer-line"></i>
                        <span>Refleksi</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="sidebar-bottom">
        {{-- Tombol untuk edit profil dan logout tetap dipertahankan --}}
        <div class="nav-item">
             <a href="{{ route('profile.edit') }}" title="Edit Profil Akun Saya">
                <i class="ri-user-settings-line"></i>
            </a>
        </div>
        <div class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" title="Logout">
                    <i class="ri-logout-box-r-line"></i>
                </a>
            </form>
        </div>
    </div>
</aside>