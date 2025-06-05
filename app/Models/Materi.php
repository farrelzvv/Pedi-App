<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import BelongsTo

class Materi extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang secara eksplisit terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'materis'; // Menyatakan bahwa model ini menggunakan tabel 'materis'

    /**
     * Atribut yang bisa diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi_singkat',
        'konten',
        'file_path',
        'tipe_materi',
        'is_published',
    ];

    /**
     * Atribut yang harus di-cast ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean', // Pastikan is_published selalu berupa boolean (true/false)
    ];

    /**
     * Mendapatkan user (Guru) yang membuat materi ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
