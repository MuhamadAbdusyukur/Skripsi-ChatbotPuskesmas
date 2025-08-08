<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image',
        'published_at',
        'comments_count',
        // 'user_id', // Jika Anda menambahkan user_id
    ];

    // Opsional: Cast published_at ke tipe datetime
    protected $casts = [
        'published_at' => 'datetime',
    ];
}