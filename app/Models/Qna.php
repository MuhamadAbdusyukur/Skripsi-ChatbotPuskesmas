<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qna extends Model
{
    protected $table = 'qna'; // <--- Tambahkan ini

    protected $fillable = [
        'keyword', 'reply',
    ];
}
