<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'foto' => 'pres_lks.jpg',
                'nama_prestasi' => 'Lomba Kompetensi Siswa (LKS) Web Technologies',
                'nama_siswa_tim' => 'Dea Azri Fauziah',
                'tingkat' => 'Provinsi',
                'juara' => 'Juara 1',
                'tahun' => '2025',
            ],
            [
                'foto' => 'pres_voly.jpg',
                'nama_prestasi' => 'Turnamen Bola Voli Antar Pelajar',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara 2',
                'nama_siswa_tim' => 'Tim Voli SMK',
                'tahun' => '2025',
            ],
            [
                'foto' => 'pres_osn.jpg',
                'nama_prestasi' => 'Olimpiade Sains Nasional (OSN) Matematika',
                'nama_siswa_tim' => 'Ahmad Fauzi',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara Harapan 1',
                'tahun' => '2026',
            ],
       [
                'foto' => 'pres_renang.jpg',
                'nama_prestasi' => 'Kejuaraan Renang Antar Pelajar (Cerdas Cup)',
                'nama_siswa_tim' => 'Nazifa aulia',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara 1 Gaya Bebas',
                'tahun' => '2025',
            ],
        ];

        foreach ($data as $item) {
            Prestasi::create($item);
        }
    }
}
