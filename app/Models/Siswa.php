<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'jurusan_id',    // <-- Ditambahkan supaya bisa disimpan ke database
        'jenis_kelamin',
        'tahun_masuk',
    ];

    /**
     * Relasi ke tabel Jurusan
     */
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }
}
