@extends('layouts.app')
@section('title', 'Mengerjakan: ' . $kuis->judul)

@section('content')
<div class="content-wrapper py-12">
    @if($pertanyaanKuis->isNotEmpty())
    <form method="POST" action="{{ route('murid.kuis.submit', $kuis->id) }}">
        @csrf
        <div class="kuis-stepper-container">
            <div>
                <div class="kuis-progress-text">
                    Soal <span id="current-question-number">1</span> dari {{ $pertanyaanKuis->count() }}
                </div>
                <div class="kuis-progress-bar">
                    <div class="kuis-progress" id="progress-bar"></div>
                </div>
            </div>

            {{-- Kontainer untuk semua pertanyaan --}}
            <div class="relative">
                @foreach ($pertanyaanKuis as $index => $pertanyaan)
                    <div id="question-{{ $index }}" class="question-slide {{ $index == 0 ? 'active' : '' }}">
                        <p class="question-text">{{ $pertanyaan->teks_pertanyaan }}</p>
                        <div class="answer-options-container">
                            @foreach ($pertanyaan->pilihanJawaban as $pilihan)
                                <label class="answer-option">
                                    <input type="radio" name="jawaban[{{ $pertanyaan->id }}]" value="{{ $pilihan->id }}" required>
                                    <span>{{ $pilihan->teks_pilihan }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Navigasi Kuis --}}
            <div class="kuis-navigation">
                <button type="button" id="prev-btn" class="kuis-nav-button" disabled>Sebelumnya</button>
                <button type="button" id="next-btn" class="kuis-nav-button">Selanjutnya</button>
                <button type="submit" id="submit-btn" class="kuis-submit-button" style="display: none;">Kumpulkan Jawaban</button>
            </div>
        </div>
    </form>
    @else
        <div class="card text-center p-8">
            <p>Kuis ini belum memiliki pertanyaan. Silakan hubungi Guru Anda.</p>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.question-slide');
        const totalQuestions = slides.length;
        if (totalQuestions === 0) return;

        let currentSlide = 0;

        const nextBtn = document.getElementById('next-btn');
        const prevBtn = document.getElementById('prev-btn');
        const submitBtn = document.getElementById('submit-btn');
        const progressText = document.getElementById('current-question-number');
        const progressBar = document.getElementById('progress-bar');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });

            // Update UI
            progressText.textContent = index + 1;
            progressBar.style.width = ((index + 1) / totalQuestions) * 100 + '%';
            prevBtn.disabled = index === 0;
            nextBtn.style.display = (index === totalQuestions - 1) ? 'none' : 'inline-block';
            submitBtn.style.display = (index === totalQuestions - 1) ? 'inline-block' : 'none';
        }

        nextBtn.addEventListener('click', () => {
            if (currentSlide < totalQuestions - 1) {
                currentSlide++;
                showSlide(currentSlide);
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentSlide > 0) {
                currentSlide--;
                showSlide(currentSlide);
            }
        });

        // Show initial slide
        showSlide(0);
    });
</script>
@endpush