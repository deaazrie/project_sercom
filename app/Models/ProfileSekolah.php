<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_sekolah',
        'kepala_sekolah',
        'foto_kepala_sekolah',
        'foto',
        'logo',
        'npsn',
        'alamat',
        'kontak',
        'visi',
        'misi',
        'tahun_berdiri',
        'deskripsi',
    ];
}
