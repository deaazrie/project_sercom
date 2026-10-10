<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Kegiatan Praktikum Lab Komputer',
                'keterangan' => 'Siswa Jurusan Rekayasa Perangkat Lunak sedang praktek coding dan membuat web.',
                'file' => 'gal_it.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-08-15',
            ],
            [
                'judul' => 'Upacara Hari Pahlawan Nasional',
                'keterangan' => 'Seluruh warga sekolah mengikuti upacara bendera di lapangan utama.',
                'file' => 'gal_upacara.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2025-11-10',
            ],
            [
                'judul' => 'Pameran Hasil Karya Siswa',
                'keterangan' => 'Pameran aplikasi dan produk kreatif hasil project akhir siswa.',
                'file' => 'gal_seni.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-06-10',
            ],
            [
                'judul' => 'Profil Singkat Sekolah SMK',
                'keterangan' => 'Video perkenalan fasilitas dan jurusan yang ada di lingkungan sekolah.',
                'file' => 'profil-sekolah.mp4',
                'kategori' => 'Video',
                'tanggal' => '2026-01-10',
            ],
        ];

        foreach ($data as $item) {
            Galeri::create($item);
        }
    }
}
