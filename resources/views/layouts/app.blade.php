<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PEDI-APP') }} - @yield('title', 'Dashboard')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" xintegrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <link rel="stylesheet" href="{{ asset('custom_ui/css/dashboard.css') }}">
    
    @stack('styles')
</head>
<body>
    <div class="app-container">
        @include('layouts.partials.custom_header')
        <main class="main-content">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('custom_ui/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>