<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prestasi;
use Illuminate\Support\Str;

class PrestasiSeeder extends Seeder
{
    public function run(): void
    {
        $prestasiData = [
            [
                'id' => 1,
                'foto' => 'pres_lks.jpg',
                'nama_prestasi' => 'Lomba Kompetensi Siswa (LKS) Web Technologies',
                'slug' => 'lomba-kompetensi-siswa-lks-web-technologies',
                'nama_siswa_tim' => 'Farida Nurhan',
                'tingkat' => 'Provinsi',
                'juara' => 'Juara 1',
                'tahun' => '2025',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:27:13',
            ],
            [
                'id' => 2,
                'foto' => 'pres_voly.jpg',
                'nama_prestasi' => 'Turnamen Bola Voli Antar Pelajar',
                'slug' => 'turnamen-bola-voli-antar-pelajar',
                'nama_siswa_tim' => 'Tim Voli SMK',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara 2',
                'tahun' => '2025',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 3,
                'foto' => 'pres_osn.jpg',
                'nama_prestasi' => 'Olimpiade Sains Nasional (OSN) Matematika',
                'slug' => 'olimpiade-sains-nasional-osn-matematika',
                'nama_siswa_tim' => 'Ahmad Fauzi',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara Harapan 1',
                'tahun' => '2026',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 4,
                'foto' => 'pres_renang.jpg',
                'nama_prestasi' => 'Kejuaraan Renang Antar Pelajar (Cerdas Cup)',
                'slug' => 'kejuaraan-renang-antar-pelajar-cerdas-cup',
                'nama_siswa_tim' => 'Nazifa aulia',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara 1 Gaya Bebas',
                'tahun' => '2025',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 5,
                'foto' => 'pres_nasionalit.jpg',
                'nama_prestasi' => 'National IT Software Solution Competition',
                'slug' => 'national-it-software-solution-competition',
                'nama_siswa_tim' => 'Dea Azri Fauziah',
                'tingkat' => 'Nasional',
                'juara' => 'Juara 1',
                'tahun' => '2026',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 6,
                'foto' => 'pres_debat.jpg',
                'nama_prestasi' => 'Lomba Debat Bahasa Inggris Tingkat Provinsi',
                'slug' => 'lomba-debat-bahasa-inggris-tingkat-provinsi',
                'nama_siswa_tim' => 'Tim Debat Sekolah',
                'tingkat' => 'Provinsi',
                'juara' => 'Juara 3',
                'tahun' => '2026',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 7,
                'foto' => 'pres_futsal1.jpg',
                'nama_prestasi' => 'Cup Futsal Antar Pelajar SMK',
                'slug' => 'cup-futsal-antar-pelajar-smk',
                'nama_siswa_tim' => 'Tim Futsal Putra',
                'tingkat' => 'Kabupaten/Kota',
                'juara' => 'Juara 2',
                'tahun' => '2025',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 8,
                'foto' => 'pres_klbb.jpg',
                'nama_prestasi' => 'Lomba Ketangkasan Baris Berbaris (LKBB)',
                'slug' => 'lomba-ketangkasan-baris-berbaris-lkbb',
                'nama_siswa_tim' => 'Tim Paskibra',
                'tingkat' => 'Provinsi',
                'juara' => 'Juara Favorit',
                'tahun' => '2026',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 9,
                'foto' => 'pres_nyanyi.jpg',
                'nama_prestasi' => 'Festival Cipta Lagu Remaja Nasional',
                'slug' => 'festival-cipta-lagu-remaja-nasional',
                'nama_siswa_tim' => 'Rizky Ramadhan',
                'tingkat' => 'Nasional',
                'juara' => 'Juara 2',
                'tahun' => '2025',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
            [
                'id' => 10,
                'foto' => 'pres_silat.jpg',
                'nama_prestasi' => 'Kejuaraan Pencak Silat Open Tourney',
                'slug' => 'kejuaraan-pencak-silat-open-tourney',
                'nama_siswa_tim' => 'Siti Aminah',
                'tingkat' => 'Nasional',
                'juara' => 'Juara 1 Kelas B Putri',
                'tahun' => '2026',
                'created_at' => '2026-10-09 18:36:25',
                'updated_at' => '2026-10-09 22:28:40',
            ],
        ];

        foreach ($prestasiData as $data) {
            Prestasi::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}
