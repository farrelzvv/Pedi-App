{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.custom_app') {{-- Menggunakan layout kustom baru Anda --}}

@section('title', 'login') {{-- Judul halaman dinamis --}}

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <h1 class="auth-card-title">Buat Akun Baru</h1>

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

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">{{ __('Nama') }}</label>
                <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            </div>

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">{{ __('Konfirmasi Password') }}</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="form-group mt-8">
                <button type="submit" class="form-button">
                    {{ __('Daftar') }}
                </button>
            </div>
            
            <div class="text-center mt-6 text-sm">
                <a class="auth-link" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>
            </div>
        </form>
    </div>
</div>
@endsection