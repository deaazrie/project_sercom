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
                'nama_guru' => 'Ahmad Subagja, S.Pd.',
                'nip'       => '198501012010011001',
                'mapel'     => 'Pemrograman Web',
                'kategori'  => 'Guru Produktif',
                'foto'      => 'ahmad.jpg',
            ],
            [
                'nama_guru' => 'Clara Aminah, S.Kom.',
                'nip'       => '199002152015022002',
                'mapel'     => 'Basis Data',
                'kategori'  => 'Guru Produktif',
                'foto'      => 'clara.jpg',
            ],
            [
                'nama_guru' => 'Budi Santoso, M.T.',
                'nip'       => '199203202018011003',
                'mapel'     => 'Pemrograman Bergerak',
                'kategori'  => 'Guru Produktif',
                'foto'      => 'budi.jpg',
            ],
            [
                'nama_guru' => 'Dewi Lestari, S.T.',
                'nip'       => '198804122012122004',
                'mapel'     => 'Jaringan Komputer',
                'kategori'  => 'Guru Produktif',
                'foto'      => 'lestari.jpg',
            ],
            [
                'nama_guru' => 'Siti Nurhaliza, M.Pd.',
                'nip'       => '198706222011012006',
                'mapel'     => 'Bahasa Indonesia',
                'kategori'  => 'Guru Mapel',
                'foto'      => 'haliza.jpg',
            ],
            [
                'nama_guru' => 'Dadan Hendrawan, S.Pd.',
                'nip'       => '199107102016011007',
                'mapel'     => 'Matematika',
                'kategori'  => 'Guru Mapel',
                'foto'      => 'dadan.jpg',
            ],
            [
                'nama_guru' => 'Ratna Kartika, S.Pd.',
                'nip'       => '198909182014022009',
                'mapel'     => 'Bahasa Inggris',
                'kategori'  => 'Guru Mapel',
                'foto'      => 'ratna.jpg',
            ],
            [
                'nama_guru' => 'Asep Saepudin, A.Md.',
                'nip'       => '199304122019031011',
                'mapel'     => 'Administrasi & Layanan Persuratan',
                'kategori'  => 'Staf Tata Usaha',
                'foto'      => 'asep.jpg',
            ],
            [
                'nama_guru' => 'Lina Marlina, S.E.',
                'nip'       => '199408222020122012',
                'mapel'     => 'Keuangan & Pendataan Siswa',
                'kategori'  => 'Staf Tata Usaha',
                'foto'      => 'lina.jpg',
            ],
            [
                'nama_guru' => 'Rian Hidayat, S.Kom.',
                'nip'       => '199612052021011013',
                'mapel'     => 'Pengelola Data & Sarpras',
                'kategori'  => 'Staf Tata Usaha',
                'foto'      => 'rian.jpg',
            ],
        ];

        foreach ($dataGuru as $guru) {
            Guru::updateOrCreate(
                ['nama_guru' => $guru['nama_guru']], // Patokan pencarian
                $guru
            );
        }
    }
}
