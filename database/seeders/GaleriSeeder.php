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
                'file' => 'https://youtu.be/KuRoG6s2kO4?si=XUroZqo7wfS5S-HG',
                'kategori' => 'Video',
                'tanggal' => '2026-01-10',
            ],
            [
                'judul' => 'Pelatihan Dasar Kepemimpinan OSIS',
                'keterangan' => 'Dokumentasi kegiatan LDK pengurus OSIS baru tahun ajaran 2026.',
                'file' => 'gal_osis.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-02-20',
            ],
            [
                'judul' => 'Juara Umum Lomba Kompetensi Siswa',
                'keterangan' => 'Penyerahan piala penghargaan kepada perwakilan siswa pemenang LKS.',
                'file' => 'gal_piala.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-03-12',
            ],
            [
                'judul' => 'Turnamen Futsal Antar Kelas',
                'keterangan' => 'Keseruan pertandingan final turnamen futsal antarkelas di GOR sekolah.',
                'file' => 'gal_fut.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-04-05',
            ],
            [
                'judul' => 'Penyuluhan Kesehatan Remaja',
                'keterangan' => 'Kegiatan sosialisasi kesehatan bersama Puskesmas di aula sekolah.',
                'file' => 'gal_kes.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-05-18',
            ],
            [
                'judul' => 'Profil Jurusan Rekayasa Perangkat Lunak',
                'keterangan' => 'Video showcase kegiatan belajar mengajar di laboratorium komputer RPL.',
                'file' => 'https://youtu.be/GXGZvz7lanc?si=7ZnB66J9i3DnLJ9w',
                'kategori' => 'Video',
                'tanggal' => '2026-07-22',
            ],
            [
                'judul' => 'Pentas Seni dan Pelepasan Siswa',
                'keterangan' => 'Penampilan seni tari tradisional dari perwakilan siswa pada acara pelepasan.',
                'file' => 'gal_pelepasan.jpg',
                'kategori' => 'Foto',
                'tanggal' => '2026-06-25',
            ],
        ];

        foreach ($data as $item) {
            Galeri::updateOrCreate(
                ['judul' => $item['judul']], // Patokan pencarian berdasarkan judul
                $item
            );
        }
    }
}
