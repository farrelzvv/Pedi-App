{{-- File: resources/views/layouts/custom_app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'PEDI-APP')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        
        <link rel="stylesheet" href="{{ asset('landing_page_assets/css/styles.css') }}" />

        {{-- Baris ini akan memastikan Tailwind CSS tetap termuat --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body class="font-sans antialiased"> {{-- Sesuaikan kelas body jika perlu --}}
        
        <div id="app_page_wrapper"> {{-- Wrapper utama aplikasi Anda --}}
            
            @include('layouts.partials.guru.header') {{-- Header Kustom Anda --}}

            <main>
                @yield('content') {{-- Konten utama halaman akan masuk di sini --}}
            </main>

            @include('layouts.partials.guru.footer') {{-- Footer Kustom Anda --}}

        </div>

        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="{{ asset('landing_page_assets/js/main.js') }}"></script>
        
        @stack('scripts')
    </body>
</html>