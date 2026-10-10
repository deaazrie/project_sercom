<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_ekskul'    => 'Pramuka',
                'guru_id'        => 1,
                'jadwal_latihan' => 'Jumat, 15:00 - 17:00 WIB',
                'deskripsi'      => 'Ekstrakurikuler wajib kepramukaan untuk melatih kedisiplinan dan kemandirian.',
                'gambar'         => 'pramuk.jpeg',
            ],
            [
                'nama_ekskul'    => 'Basket',
                'guru_id'        => 2,
                'jadwal_latihan' => 'Rabu & Sabtu, 16:00 WIB',
                'deskripsi'      => 'Wadah pengembangan bakat olahraga bola basket siswa.',
                'gambar'         => 'bass.jpeg',
            ],
        ];

        foreach ($data as $item) {
            Ekstrakurikuler::create($item);
        }
    }

}
