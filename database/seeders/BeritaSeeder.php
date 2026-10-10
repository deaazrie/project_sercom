<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        Berita::create([
            'judul' => 'Pengumuman Kegiatan Sekolah',
            'isi' => 'Sekolah akan melaksanakan berbagai kegiatan untuk mendukung proses pembelajaran dan pengembangan siswa.',
            'tanggal' => '2026-01-15',
            'gambar' => 'kegiatan.b.jpg',
            'id_user' => 1,
            'status' => 'public',
        ]);

        Berita::create([
            'judul' => 'Pelaksanaan Ujian Semester',
            'isi' => 'Pelaksanaan ujian semester akan dilaksanakan sesuai dengan jadwal yang telah ditentukan oleh sekolah.',
            'tanggal' => '2026-02-10',
            'gambar' => 'ujian.b.jpg',
            'id_user' => 1,
            'status' => 'public',
        ]);

        Berita::create([
            'judul' => 'Kegiatan Ekstrakurikuler Sekolah',
            'isi' => 'Kegiatan ekstrakurikuler kembali dilaksanakan sebagai wadah bagi siswa untuk mengembangkan minat dan bakat.',
            'tanggal' => '2026-03-05',
            'gambar' => 'eskul.b.jpg',
            'id_user' => 1,
            'status' => 'public',
        ]);

        Berita::create([
            'judul' => 'Penerimaan Peserta Didik Baru',
            'isi' => 'SMK Arunika Teknologi membuka informasi penerimaan peserta didik baru untuk tahun ajaran berikutnya.',
            'tanggal' => '2026-04-20',
            'gambar' => 'ppdb.b.jpg',
            'id_user' => 1,
            'status' => 'public',
        ]);

        Berita::create([
            'judul' => 'Prestasi Siswa SMK Arunika Teknologi',
            'isi' => 'Siswa SMK Arunika Teknologi berhasil meraih prestasi dalam kegiatan dan kompetisi yang diikuti.',
            'tanggal' => '2026-05-12',
            'gambar' => 'juara.b.jpg',
            'id_user' => 1,
            'status' => 'public',
        ]);
    }
}
