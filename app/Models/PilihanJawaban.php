<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class PilihanJawaban extends Model
{
    use HasFactory;

    protected $table = 'pilihan_jawaban';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pertanyaan_id',
        'teks_pilihan',
        'is_benar',
    ];

    /**
     * Casting atribut is_benar ke boolean.
     *
     * @var array
     */
    protected $casts = [
        'is_benar' => 'boolean',
    ];

    /**
     * Mendapatkan pertanyaan yang memiliki pilihan jawaban ini.
     */
    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    public function attemptAnswers(): HasMany
    {
        return $this->hasMany(AttemptAnswer::class, 'pilihan_jawaban_id');
    }
}
