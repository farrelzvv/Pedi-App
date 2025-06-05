<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttemptAnswer extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * (Opsional jika nama tabel adalah 'attempt_answers')
     * protected $table = 'attempt_answers';
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'kuis_attempt_id',
        'pertanyaan_id',
        'pilihan_jawaban_id',
        'is_benar',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_benar' => 'boolean',
    ];

    /**
     * Mendapatkan upaya kuis yang memiliki jawaban ini.
     */
    public function kuisAttempt(): BelongsTo
    {
        return $this->belongsTo(KuisAttempt::class, 'kuis_attempt_id');
    }

    /**
     * Mendapatkan pertanyaan yang dijawab.
     */
    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    /**
     * Mendapatkan pilihan jawaban yang dipilih oleh murid.
     */
    public function pilihanJawaban(): BelongsTo
    {
        return $this->belongsTo(PilihanJawaban::class, 'pilihan_jawaban_id');
    }
}
