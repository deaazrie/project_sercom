<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'foto',
        'nama_prestasi',
        'slug',
        'nama_siswa_tim',
        'tingkat',
        'juara',
        'tahun',
    ];

        public function getRouteKeyName()
    {
        return 'slug';
    }
}


