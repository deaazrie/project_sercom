<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSiswa = [
            [
                'nisn' => '0012345678',
                'nama_siswa' => 'Alya Putri Ramadhani',
                'kelas' => 'XII',
                'jurusan_id' => 1, // RPL
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2024,
            ],
            [
                'nisn' => '0012345679',
                'nama_siswa' => 'Rizky Maulana',
                'kelas' => 'XII',
                'jurusan_id' => 1, // RPL
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2024,
            ],
            [
                'nisn' => '0012345680',
                'nama_siswa' => 'Nabila Salsabila',
                'kelas' => 'XI',
                'jurusan_id' => 1, // RPL
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2025,
            ],
            [
                'nisn' => '0012345681',
                'nama_siswa' => 'Fajar Ramadhan',
                'kelas' => 'XI',
                'jurusan_id' => 1, // RPL
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2025,
            ],
            [
                'nisn' => '0012345682',
                'nama_siswa' => 'Siti Aulia',
                'kelas' => 'X',
                'jurusan_id' => 1, // RPL
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2026,
            ],
            [
                'nisn' => '0012345683',
                'nama_siswa' => 'Dimas Prasetyo',
                'kelas' => 'X',
                'jurusan_id' => 1, // RPL
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2026,
            ],
            [
                'nisn' => '0012345684',
                'nama_siswa' => 'Zahra Nur Aini',
                'kelas' => 'XII',
                'jurusan_id' => 2, // TKJ
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2024,
            ],
            [
                'nisn' => '0012345685',
                'nama_siswa' => 'Reza Pratama',
                'kelas' => 'XI',
                'jurusan_id' => 2, // TKJ
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2025,
            ],
            [
                'nisn' => '0012345686',
                'nama_siswa' => 'Salma Melina',
                'kelas' => 'X',
                'jurusan_id' => 3, // Akuntansi
                'jenis_kelamin' => 'Perempuan',
                'tahun_masuk' => 2026,
            ],
            [
                'nisn' => '0012345687',
                'nama_siswa' => 'Gilang Ramadhan',
                'kelas' => 'XI',
                'jurusan_id' => 4, // Pemasaran
                'jenis_kelamin' => 'Laki-Laki',
                'tahun_masuk' => 2025,
            ],
        ];

        foreach ($dataSiswa as $siswa) {
            Siswa::updateOrCreate(
                ['nisn' => $siswa['nisn']],
                $siswa
            );
        }
    }
}
