<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /** @use HasFactory<\Database\Factories\GuruFactory> */
    // use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama_guru',
        'nip',
        'kategori',
        'mapel',
        'foto'
    ];

    public function ekstrakulikuler(): HasMany
    {
        return $this->hasMany(Ekstrakulikuler::class, 'id_guru', 'id');
    }
}
