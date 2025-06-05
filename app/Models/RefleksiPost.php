<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RefleksiPost extends Model
{
    use HasFactory;

    protected $table = 'refleksi_posts';

    protected $fillable = [
        'user_id',
        'parent_id',
        'konten_teks',
        'gambar_path',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(RefleksiPost::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(RefleksiPost::class, 'parent_id')->orderBy('created_at', 'asc');
    }
}
