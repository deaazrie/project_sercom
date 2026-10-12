<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'tanggal',
        'gambar',
        'id_user',
        'status',
    ];

        public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Relasi ke model User (penulis berita)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
