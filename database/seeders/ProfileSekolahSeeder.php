<?php

namespace Database\Seeders;

use App\Models\ProfileSekolah;
use Illuminate\Database\Seeder;

class ProfileSekolahSeeder extends Seeder
{
    public function run(): void
    {
        ProfileSekolah::updateOrCreate(
            ['id' => 1],
            [
                'nama_sekolah'        => 'SMK Teknologi Nusantara',
                'npsn'                => '20299999',
                'kepala_sekolah'      => 'Dr. H. Ahmad Firmansyah, M.Pd.',
                'foto_kepala_sekolah' => null,
                'tahun_berdiri'       => '1997',
                'kontak'              => '(0265) 123456',
                'alamat'              => 'Jl. Pendidikan Nusantara No. 25, Kota Bandung, Jawa Barat 40132',
                'logo' => null,
                'foto' => null,
                'deskripsi'          => "SMK Teknologi Nusantara merupakan sekolah menengah kejuruan yang berkomitmen dalam mencetak generasi muda yang kompeten, kreatif, disiplin, dan siap menghadapi perkembangan dunia teknologi dan industri.",
                'visi'               => "Mewujudkan generasi unggul yang kompeten, inovatif, berkarakter, dan berdaya saing di era digital serta dunia kerja.",
                'misi' => "1. Menyelenggarakan pembelajaran berbasis teknologi.\n2. Mengembangkan kompetensi siswa sesuai bidang keahlian.\n3. Membentuk karakter siswa yang berakhlak mulia.",
            ]
        );
    }
}
