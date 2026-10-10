<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    // use HasFactory;

    // Tambihan baris ieu supados Laravel milari tabel 'guru' (sanes 'gurus')
    protected $table = 'guru';

    protected $fillable = [
        'nama_guru',
        'nip',
        'kategori',
        'mapel',
        // 'status',
        'foto'
    ];

    public function ekstrakulikuler(): HasMany
    {
        return $this->hasMany(Ekstrakulikuler::class, 'id_guru', 'id');
    }
}
