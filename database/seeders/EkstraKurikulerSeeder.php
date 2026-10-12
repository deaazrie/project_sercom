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
            [
                'nama_ekskul'    => 'Futsal',
                'guru_id'        => 3,
                'jadwal_latihan' => 'Selasa & Kamis, 15:30 WIB',
                'deskripsi'      => 'Melatih keterampilan kerjasama tim dan teknik bermain sepak bola mini.',
                'gambar'         => 'es_futsal.jpg',
            ],
            [
                'nama_ekskul'    => 'Paskibra',
                'guru_id'        => 4,
                'jadwal_latihan' => 'Minggu, 08:00 WIB',
                'deskripsi'      => 'Pasukan pengibar bendera untuk melatih ketangkasan, baris-berbaris, dan jiwa nasionalisme.',
                'gambar'         => 'es_paskib.jpg',
            ],
            [
                'nama_ekskul'    => 'Rohis (Rohani Islam)',
                'guru_id'        => 5,
                'jadwal_latihan' => 'Jumat, 13:00 WIB (Selepas Sholat Jumat)',
                'deskripsi'      => 'Mendalami ilmu keislaman, tadarus Al-Quran, dan pembentukan karakter akhlak mulia.',
                'gambar'         => 'es_rohis.jpg',
            ],
            [
                'nama_ekskul'    => 'PMR (Palang Merah Remaja)',
                'guru_id'        => 6,
                'jadwal_latihan' => 'Senin, 16:00 WIB',
                'deskripsi'      => 'Belajar dasar-dasar pertolongan pertama pada kecelakaan dan kesehatan remaja.',
                'gambar'         => 'es_pmr.jpg',
            ],
            [
                'nama_ekskul'    => 'English Club',
                'guru_id'        => 7,
                'jadwal_latihan' => 'Rabu, 15:30 WIB',
                'deskripsi'      => 'Meningkatkan kemampuan berbicara, mendengarkan, dan percaya diri berbahasa Inggris.',
                'gambar'         => 'es_club.jpg',
            ],
            [
                'nama_ekskul'    => 'Coding & Web Development',
                'guru_id'        => 8,
                'jadwal_latihan' => 'Kamis, 15:00 WIB',
                'deskripsi'      => 'Wadah khusus siswa RPL untuk eksplorasi pembuatan website dan aplikasi kreatif.',
                'gambar'         => 'es_coding.jpg',
            ],
            [
                'nama_ekskul'    => 'Seni Tari & Musik',
                'guru_id'        => 9,
                'jadwal_latihan' => 'Selasa, 16:00 WIB',
                'deskripsi'      => 'Melestarikan seni budaya daerah melalui tarian tradisional serta latihan seni musik.',
                'gambar'         => 'es_semus.jpg',
            ],
            [
                'nama_ekskul'    => 'Pencak Silat',
                'guru_id'        => 10,
                'jadwal_latihan' => 'Sabtu, 14:00 WIB',
                'deskripsi'      => 'Mempelajari seni bela diri tradisional asli Indonesia sekaligus melatih fisik dan mental.',
                'gambar'         => 'es_silat.jpg',
            ],
        ];

        foreach ($data as $item) {
            Ekstrakurikuler::updateOrCreate(
                ['nama_ekskul' => $item['nama_ekskul']],
                $item
            );
        }
    }
}
