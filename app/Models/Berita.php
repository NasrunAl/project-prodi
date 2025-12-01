<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'penulis',
        'slug',
        'konten',
        'gambar',
        'excerpt',
        'user_id',
    ];

    /**
     * Relationship dengan User model
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the previous berita
     */
    public function previous()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    /**
     * Get the next berita
     */
    public function next()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }
}
