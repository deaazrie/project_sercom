<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikuler';

    protected $fillable = [
        'nama_ekskul',
        'guru_id',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];

        public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
