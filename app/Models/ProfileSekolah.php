<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSekolah extends Model
{
    use HasFactory;

    // Menyesuaikan dengan nama tabel asli di database
    protected $table = 'profil_sekolah';
    protected $primaryKey = 'id';

    // Daftar kolom yang diizinkan untuk diisi/di-update massal
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
