{{-- File: resources/views/layouts/guru_app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PEDI-APP') }} - @yield('title', 'Dashboard Guru')</title>

    {{-- Semua link CSS & Font sama dengan layout utama Anda --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('custom_ui/css/dashboard.css') }}">

    @stack('styles')
</head>
<body>

    <div class="app-container">
        {{-- INI PERBEDAAN UTAMA: Memanggil header khusus Guru --}}
        @include('layouts.partials.guru.header')

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