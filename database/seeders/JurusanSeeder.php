<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'kode_ikon' => 'bi-laptop',
                'deskripsi' => 'Mendalami pemrograman web, aplikasi mobile, dan pengembangan perangkat lunak.',
            ],
            [
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
                'kode_ikon' => 'bi-cpu',
                'deskripsi' => 'Mempelajari perakitan komputer, jaringan komputer, dan administrasi server.',
            ],
            [
                'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
                'kode_ikon' => 'bi-cash-coin',
                'deskripsi' => 'Belajar siklus akuntansi, perpajakan, dan pengoperasian software keuangan.',
            ],
            [
                'nama_jurusan' => 'Bisnis Daring dan Pemasaran',
                'kode_ikon' => 'bi-shop',
                'deskripsi' => 'Mempelajari strategi pemasaran digital, e-commerce, dan pengelolaan bisnis retail.',
            ],
            [
                'nama_jurusan' => 'Desain Komunikasi Visual',
                'kode_ikon' => 'bi-palette',
                'deskripsi' => 'Mengembangkan kreativitas dalam bidang desain grafis, ilustrasi, dan multimedia.',
            ],
        ];

        foreach ($data as $item) {
            Jurusan::create($item);
        }
    }
}
