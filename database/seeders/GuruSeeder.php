<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataGuru = [
            [
                'nip'       => '198501012010011001',
                'nama_guru' => 'Ahmad Subagja, S.Pd.',
                'mapel'     => 'Pemrograman Web',
                'foto'      => null, 
            ],
            [
                'nip'       => '199002152015022002',
                'nama_guru' => 'Siti Aminah, S.Kom.',
                'mapel'     => 'Basis Data',
                'foto'      => null,
            ],
            [
                'nip'       => null,
                'nama_guru' => 'Budi Santoso, M.T.',
                'mapel'     => 'Pemrograman Bergerak',
                'foto'      => null,
            ],
        ];

        foreach ($dataGuru as $guru) {
            Guru::create($guru);
        }
    }
}
