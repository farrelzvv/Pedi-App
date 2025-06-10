{{-- File: resources/views/games/index.blade.php (VERSI BARU DENGAN GAMBAR) --}}
@extends('layouts.app')

@section('title', 'Games Edukasi')

@section('content')
    <div class="content-wrapper">
        <div class="games-container">
            {{-- Kartu untuk Game True or False --}}
            <a href="https://www.educaplay.com/learning-resources/23965219-yes_or_no.html" target="_blank" class="game-card">
                {{-- Ganti <i> dengan <img> --}}
                <img src="{{ asset('custom_ui/images/true-false.png') }}" alt="True or False Game" class="game-icon">

                <h4 class="game-title">True or False Game</h4>
            </a>

            {{-- Kartu untuk Game Drag and Drop --}}
            <a href="https://wordwall.net/resource/93017342" target="_blank" class="game-card">
                {{-- Ganti <i> dengan <img> --}}
                <img src="{{ asset('custom_ui/images/drag.png') }}" alt="Drag and Drop Game" class="game-icon">

                <h4 class="game-title">Drag and Drop Game</h4>
            </a>
        </div>
    </div>
@endsection