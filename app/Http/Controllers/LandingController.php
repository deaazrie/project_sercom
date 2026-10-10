<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\ProfileSekolah;
use App\Models\Prestasi;
use App\Models\Galeri;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\Berita;
use App\Models\Siswa;

class LandingController extends Controller
{
    public function index()
    {
        $profilSekolah = ProfileSekolah::first();
        $prestasi      = Prestasi::all();
        $galeri        = Galeri::all();
        $jurusan       = Jurusan::all();
        $guru          = Guru::all();
        $berita        = Berita::all();
        $ekstrakurikuler = Ekstrakurikuler::all();

        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalPrestasi = Prestasi::count();
        $totalJurusan = Jurusan::count();

        return view('landing.index', compact(
            'profilSekolah', 'prestasi', 'galeri', 'jurusan', 'guru',
            'ekstrakurikuler', 'berita', 'totalSiswa', 'totalGuru',
            'totalPrestasi', 'totalJurusan'
        ));
    }

    public function profil()
    {
        $profilSekolah = ProfileSekolah::first();
        return view('landing.profil', compact('profilSekolah'));
    }

    public function jurusanIndex()
    {
        $jurusan = Jurusan::all();
        return view('landing.jurusan', compact('jurusan'));
    }

    public function jurusanDetail($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            $jurusan = Jurusan::findOrFail($id);
            return view('landing.detail-jurusan', compact('jurusan'));
        } catch (\Exception $e) {
            return redirect()->route('landing.jurusan.index')->with('error', 'Data tidak valid.');
        }
    }

    public function guruIndex()
    {
        $guru = Guru::all();
        return view('landing.guru', compact('guru'));
    }

    public function guruDetail($encryptedId)
    {
        try {
            $id = Crypt::decryptString($encryptedId);
            $guru = Guru::findOrFail($id);
            return view('landing.detail-guru', compact('guru'));
        } catch (\Exception $e) {
            return redirect()->route('landing.guru.index')->with('error', 'Data tidak valid.');
        }
    }

    // public function prestasiIndex()
    // {
    //     $prestasi = Prestasi::all();
    //     return view('landing.prestasi', compact('prestasi'));
    // }

    // public function prestasiDetail($encryptedId)
    // {
    //     try {
    //         try {
    //             $id = Crypt::decryptString($encryptedId);
    //         } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
    //             $id = $encryptedId;
    //         }

    //         $prestasi = Prestasi::findOrFail($id);
    //         return view('landing.detail-prestasi', compact('prestasi'));
    //     } catch (\Exception $e) {
    //         return redirect()->route('landing.prestasi.index');
    //     }
    // }

   public function prestasiIndex()
    {
        $prestasi = Prestasi::latest()->paginate(9);
        return view('landing.prestasi', compact('prestasi'));
    }

    // Menggunakan slug untuk halaman detail prestasi publik
    public function prestasiDetail($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();
        return view('landing.detail-prestasi', compact('prestasi'));
    }

    public function ekstrakurikulerIndex()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('landing.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function ekstrakurikulerDetail($encryptedId)
    {
        try {
            try {
                $id = Crypt::decryptString($encryptedId);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                $id = $encryptedId;
            }

            $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
            return view('landing.detail-ekstrakurikuler', compact('ekstrakurikuler'));
        } catch (\Exception $e) {
            return redirect()->route('landing.ekstrakurikuler.index');
        }
    }

    public function beritaIndex()
    {
        $berita = Berita::latest()->paginate(9);
        return view('landing.berita', compact('berita'));
    }

    // Menggunakan slug untuk halaman detail berita publik
    public function detailBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('landing.detail-berita', compact('berita'));
    }

    public function galeriIndex()
    {
        $galeri = Galeri::latest()->paginate(9);
        return view('landing.galeri', compact('galeri'));
    }

    public function galeriDetail($encryptedId)
    {
        try {
            try {
                $id = Crypt::decryptString($encryptedId);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                $id = $encryptedId;
            }

            $galeri = Galeri::findOrFail($id);
            return view('landing.detail-galeri', compact('galeri'));
        } catch (\Exception $e) {
            return redirect()->route('landing.galeri.index');
        }
    }
}
