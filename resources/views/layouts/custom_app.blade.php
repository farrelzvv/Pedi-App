{{-- File: resources/views/layouts/app.blade.php (VERSI PERBAIKAN FINAL) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PEDI-APP') }} - @yield('title', 'Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('custom_ui/css/dashboard.css') }}">

    @stack('styles')
</head>
<body>

    <div class="app-container">
        <aside class="sidebar">
            <div class="sidebar-top">
                <div class="sidebar-logo">
                    <div class="logo-icon-box">
                        <i class="ri-book-open-line"></i>
                    </div>
                </div>
                <nav class="sidebar-nav">
                    <ul>
                        {{-- Tampilkan menu berdasarkan status login --}}
                        @auth
                            {{-- MENU UNTUK USER YANG SUDAH LOGIN --}}
                            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}">
                                    <i class="ri-home-5-line"></i>
                                    <span>home</span>
                                </a>
                            </li>

                            @if(Auth::user()->role == 1) {{-- Menu untuk Murid (role 1) --}}
                                <li class="nav-item {{ request()->routeIs('petunjuk.penggunaan') ? 'active' : '' }}">
                                    <a href="{{ route('petunjuk.penggunaan') }}">
                                        <i class="ri-lightbulb-flash-line"></i>
                                        <span>Petunjuk</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('murid.materi.*') ? 'active' : '' }}">
                                    <a href="{{ route('murid.materi.index') }}">
                                        <i class="ri-book-3-line"></i>
                                        <span>Materi</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('murid.kuis.*') ? 'active' : '' }}">
                                    <a href="{{ route('murid.kuis.index') }}">
                                        <i class="ri-gamepad-line"></i>
                                        <span>Kuis</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('games.index') ? 'active' : '' }}">
                                    <a href="{{ route('games.index') }}">
                                        <i class="ri-gamepad-line"></i>
                                        <span>Games</span>
                                    </a>
                                </li>
                            
                            @elseif(Auth::user()->role == 0) {{-- Menu untuk Guru (role 0) --}}
                                <li class="nav-item {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
                                    <a href="{{ route('guru.dashboard') }}">
                                        <i class="ri-dashboard-line"></i>
                                        <span>Guru</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Menu Refleksi & Profil untuk semua user yang login --}}
                            <li class="nav-item {{ request()->routeIs('refleksi.index') ? 'active' : '' }}">
                                <a href="{{ route('refleksi.index') }}">
                                    <i class="ri-question-answer-line"></i>
                                    <span>Refleksi</span>
                                </a>
                            </li>
                             <li class="nav-item {{ request()->routeIs('profile.pengembang') ? 'active' : '' }}">
                                <a href="{{ route('profile.pengembang') }}">
                                    <i class="ri-user-line"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                        @else
                            {{-- MENU UNTUK TAMU (BELUM LOGIN) --}}
                            <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }}">
                                <a href="{{ route('login') }}">
                                    <i class="ri-login-box-line"></i>
                                    <span>Login</span>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
            <div class="sidebar-bottom">
                @auth {{-- Tampilkan hanya jika sudah login --}}
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
                @endauth
            </div>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>

    {{-- Script JS Anda --}}
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('custom_ui/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>