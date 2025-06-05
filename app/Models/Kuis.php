<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo
use Illuminate\Database\Eloquent\Relations\HasMany;   // Import HasMany

class Kuis extends Model
{
    use HasFactory;
    protected $table = 'kuis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
    ];

    /**
     * Mendapatkan user (Guru) yang membuat kuis ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Mendapatkan semua pertanyaan yang ada dalam kuis ini.
     */
    public function pertanyaan(): HasMany // Atau questions() jika Anda menamai relasinya demikian
    {
        return $this->hasMany(Pertanyaan::class, 'kuis_id');
    }

    public function kuisAttempts(): HasMany // atau attempts()
    {
        return $this->hasMany(KuisAttempt::class, 'kuis_id');
    }
}
