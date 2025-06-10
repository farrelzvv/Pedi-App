<aside class="sidebar">
    <div class="sidebar-top">
        <div class="sidebar-logo">
    {{-- Ganti div logo-icon-box dengan tag img --}}
    <img src="{{ asset('custom_ui/images/logo-pedi.png') }}" alt="PEDI-APP Logo" class="logo-image">
</div>
        <nav class="sidebar-nav">
            <ul>
                @auth
                    {{-- MENU SETELAH LOGIN --}}
                    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"><i class="ri-home-5-line"></i><span>home</span></a>
                    </li>

                    @if(Auth::user()->role == 1) {{-- Menu Murid --}}
                        <li class="nav-item {{ request()->routeIs('petunjuk.penggunaan') ? 'active' : '' }}"><a href="{{ route('petunjuk.penggunaan') }}"><i class="ri-lightbulb-flash-line"></i><span>Petunjuk</span></a></li>
                        <li class="nav-item {{ request()->routeIs('murid.materi.*') ? 'active' : '' }}"><a href="{{ route('murid.materi.index') }}"><i class="ri-book-3-line"></i><span>Materi</span></a></li>
                        <li class="nav-item {{ request()->routeIs('games.index') ? 'active' : '' }}"><a href="{{ route('games.index') }}"><i class="ri-gamepad-line"></i><span>Games</span></a></li>
                    @elseif(Auth::user()->role == 0) {{-- Menu jika Guru ada di halaman non-guru --}}
                        <li class="nav-item {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}"><a href="{{ route('guru.dashboard') }}"><i class="ri-dashboard-line"></i><span>Dashboard</span></a></li>
                    @endif

                    <li class="nav-item {{ request()->routeIs('refleksi.index') ? 'active' : '' }}"><a href="{{ route('refleksi.index') }}"><i class="ri-question-answer-line"></i><span>Refleksi</span></a></li>
                @else
                    {{-- MENU SEBELUM LOGIN --}}
                    <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                        <a href="{{ route('login') }}"><i class="ri-login-box-line"></i><span>Login</span></a>
                    </li>
                @endauth
            </ul>
        </nav>
    </div>
    <div class="sidebar-bottom">
        @auth
            <div class="nav-item">
                 <a href="{{ route('profile.pengembang') }}" title="Profile Pengembang" class="{{ request()->routeIs('profile.pengembang') ? 'active' : '' }}">
                    <i class="ri-user-line"></i>
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
        @endauth
    </div>
</aside>