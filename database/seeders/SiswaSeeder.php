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
        Siswa::create([
            'nisn' => '0012345678',
            'nama_siswa' => 'Alya Putri Ramadhani',
            'kelas' => 'XII RPL 1',
            'jenis_kelamin' => 'Perempuan',
            'tahun_masuk' => 2024,
        ]);

        Siswa::create([
            'nisn' => '0012345679',
            'nama_siswa' => 'Rizky Maulana',
            'kelas' => 'XII RPL 1',
            'jenis_kelamin' => 'Laki-laki',
            'tahun_masuk' => 2024,
        ]);

        Siswa::create([
            'nisn' => '0012345680',
            'nama_siswa' => 'Nabila Salsabila',
            'kelas' => 'XI RPL 2',
            'jenis_kelamin' => 'Perempuan',
            'tahun_masuk' => 2025,
        ]);

        Siswa::create([
            'nisn' => '0012345681',
            'nama_siswa' => 'Fajar Ramadhan',
            'kelas' => 'XI RPL 2',
            'jenis_kelamin' => 'Laki-laki',
            'tahun_masuk' => 2025,
        ]);

        Siswa::create([
            'nisn' => '0012345682',
            'nama_siswa' => 'Siti Aulia',
            'kelas' => 'X RPL 1',
            'jenis_kelamin' => 'Perempuan',
            'tahun_masuk' => 2026,
        ]);
    }
}
