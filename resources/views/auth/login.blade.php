@extends('layouts.custom_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'login') {{-- Judul halaman dinamis --}}

@section('content')
<div class="auth-container">
    <div class="auth-card">
        
        <h1 class="auth-card-title">Login Akun</h1>

        @if ($errors->any())
            <div class="form-error-list">
                <div class="font-medium">{{ __('Whoops! Ada yang salah.') }}</div>
                <ul class="mt-2 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="form-group flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="auth-link" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="form-button">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="text-center mt-6 text-sm">
                <span class="text-gray-600">Belum punya akun?</span>
                <a href="{{ route('register') }}" class="auth-link">Daftar di sini</a>
            </div>
        </form>
    </div>
</div>
@endsection