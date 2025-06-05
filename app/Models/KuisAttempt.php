<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KuisAttempt extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * (Opsional jika nama tabel adalah 'kuis_attempts' - plural dari KuisAttempt)
     * protected $table = 'kuis_attempts';
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'kuis_id',
        'skor',
    ];

    /**
     * Mendapatkan user (Murid) yang melakukan upaya ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Mendapatkan kuis yang dikerjakan dalam upaya ini.
     */
    public function kuis(): BelongsTo
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    /**
     * Mendapatkan semua jawaban spesifik untuk upaya kuis ini.
     */
    public function attemptAnswers(): HasMany
    {
        return $this->hasMany(AttemptAnswer::class, 'kuis_attempt_id');
    }
}
