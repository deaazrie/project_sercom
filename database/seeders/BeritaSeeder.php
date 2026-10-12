<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritaData = [
            [
                'id' => 1,
                'judul' => 'Pengumuman Kegiatan Sekolah',
                'slug' => 'pengumuman-kegiatan-sekolah',
                'isi' => 'Sekolah akan melaksanakan berbagai kegiatan untuk mendukung proses pembelajaran dan pengembangan siswa.',
                'status' => 'public',
                'tanggal' => '2026-01-15',
                'gambar' => 'kegiatan.b.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 2,
                'judul' => 'Pelaksanaan Ujian Semester',
                'slug' => 'pelaksanaan-ujian-semester',
                'isi' => 'Pelaksanaan ujian semester akan dilaksanakan sesuai dengan jadwal yang telah ditentukan oleh sekolah.',
                'status' => 'public',
                'tanggal' => '2026-02-10',
                'gambar' => 'ujian.b.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 3,
                'judul' => 'Kegiatan Ekstrakurikuler Sekolah',
                'slug' => 'kegiatan-ekstrakurikuler-sekolah',
                'isi' => 'Kegiatan ekstrakurikuler kembali dilaksanakan sebagai wadah bagi siswa untuk mengembangkan minat dan bakat.',
                'status' => 'public',
                'tanggal' => '2026-03-05',
                'gambar' => 'eskul.b.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 4,
                'judul' => 'Penerimaan Peserta Didik Baru',
                'slug' => 'penerimaan-peserta-didik-baru',
                'isi' => 'SMK Arunika Teknologi membuka informasi penerimaan peserta didik baru untuk tahun ajaran berikutnya.',
                'status' => 'public',
                'tanggal' => '2026-04-20',
                'gambar' => 'ppdb.b.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 5,
                'judul' => 'Prestasi Siswa SMK Arunika Teknologi',
                'slug' => 'prestasi-siswa-smk-arunika-teknologi',
                'isi' => 'Siswa SMK Arunika Teknologi berhasil meraih prestasi dalam kegiatan dan kompetisi yang diikuti.',
                'status' => 'public',
                'tanggal' => '2026-05-12',
                'gambar' => 'juara.b.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 6,
                'judul' => 'Workshop Pemrograman Web Modern',
                'slug' => 'workshop-pemrograman-web-modern',
                'isi' => 'Siswa jurusan Rekayasa Perangkat Lunak mengikuti workshop pengembangan web menggunakan Laravel dan Bootstrap.',
                'status' => 'public',
                'tanggal' => '2026-06-15',
                'gambar' => 'berita_wm.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 7,
                'judul' => 'Peringatan Hari Pendidikan Nasional',
                'slug' => 'peringatan-hari-pendidikan-nasional',
                'isi' => 'Seluruh warga sekolah melaksanakan upacara bendera untuk memperingati Hari Pendidikan Nasional tahun 2026.',
                'status' => 'public',
                'tanggal' => '2026-05-02',
                'gambar' => 'ber_pendidikan.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 8,
                'judul' => 'Penyuluhan Kesehatan dan Kebersihan Lingkungan',
                'slug' => 'penyuluhan-kesehatan-dan-kebersihan-lingkungan',
                'isi' => 'Puskesmas setempat bekerja sama dengan sekolah mengadakan penyuluhan pentingnya menjaga kebersihan lingkungan.',
                'status' => 'public',
                'tanggal' => '2026-07-08',
                'gambar' => 'ber_lingkungan.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 9,
                'judul' => 'Pelatihan Dasar Kepemimpinan OSIS',
                'slug' => 'pelatihan-dasar-kepemimpinan-osis',
                'isi' => 'Pengurus OSIS baru mengikuti kegiatan LDK untuk melatih jiwa kepemimpinan, kedisiplinan, dan kerja sama tim.',
                'status' => 'public',
                'tanggal' => '2026-08-14',
                'gambar' => 'ber_osis.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
            [
                'id' => 10,
                'judul' => 'Pameran Hasil Karya Projek Siswa',
                'slug' => 'pameran-hasil-karya-projek-siswa',
                'isi' => 'Siswa menampilkan berbagai macam hasil karya aplikasi dan produk kreatif pada pameran akhir semester.',
                'status' => 'public',
                'tanggal' => '2026-09-20',
                'gambar' => 'ber_seni.jpg',
                'id_user' => 1,
                'created_at' => '2026-10-09 18:36:24',
                'updated_at' => '2026-10-09 22:23:35',
            ],
        ];

        foreach ($beritaData as $data) {
            Berita::updateOrCreate(['id' => $data['id']], $data);
        }
    }
}
