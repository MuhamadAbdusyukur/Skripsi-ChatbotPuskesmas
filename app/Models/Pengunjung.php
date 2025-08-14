<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    
protected $fillable = [
    'nik', 'no_kk', 'nama', 'telepon', 'alamat', 'keluhan', 'tgl_kunjung', 'poli_id'
];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
