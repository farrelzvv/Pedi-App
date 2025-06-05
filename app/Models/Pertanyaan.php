<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo
use Illuminate\Database\Eloquent\Relations\HasMany;   // Import HasMany

class Pertanyaan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'pertanyaan'; // <-- TAMBAHKAN BARIS INI

    protected $fillable = [
        'kuis_id',
        'teks_pertanyaan',
        'tipe_pertanyaan',
    ];

    /**
     * Mendapatkan kuis yang memiliki pertanyaan ini.
     */
    public function kuis(): BelongsTo
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    /**
     * Mendapatkan semua pilihan jawaban untuk pertanyaan ini.
     */
    public function pilihanJawaban(): HasMany // Anda bisa menamainya pilihanJawabans atau answerChoices jika mau
    {
        // Pastikan nama model PilihanJawaban sudah benar
        return $this->hasMany(PilihanJawaban::class, 'pertanyaan_id');
    }

    public function attemptAnswers(): HasMany
    {
        return $this->hasMany(AttemptAnswer::class, 'pertanyaan_id');
    }
}
