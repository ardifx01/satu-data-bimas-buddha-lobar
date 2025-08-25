<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostBerita extends Model
{
    protected $table = 'post_berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'status',
        'penulis',
        'tanggal_terbit',
    ];

    protected $casts = [
        'tanggal_terbit' => 'datetime', // ✅ casting datetime dengan Carbon
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->judul);
            }
        });
    }
}