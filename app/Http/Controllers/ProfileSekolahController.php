<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSekolahController extends Controller
{
    /**
     * Menampilkan form edit profil sekolah.
     */
    public function index()
    {
        $profilSekolah = ProfileSekolah::first();
        $title = 'Profil Sekolah';

        return view('admin.profile.index', compact('profilSekolah', 'title'));
    }

    /**
     * Menampilkan halaman edit profil sekolah.
     */
    public function edit()
    {
        $profilSekolah = ProfileSekolah::first();
        $title = 'Edit Profil';

        return view('admin.profile.edit', compact('profilSekolah', 'title'));
    }

    /**
     * Menyimpan perubahan profil sekolah.
     */
    public function update(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'nama_sekolah'       => 'required|max:255',
            'kepala_sekolah'     => 'nullable|max:255',
            'npsn'               => 'required|max:20',
            'kontak'             => 'nullable|max:50',
            'tahun_berdiri'      => 'nullable|numeric',
            'alamat'             => 'required',
            'visi'               => 'nullable',
            'misi'               => 'nullable',
            'deskripsi'          => 'nullable',
            'logo'               => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:10240',
            'foto'               => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:10240',
            'foto_kepala_sekolah'=> 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:10240',
        ], [
            'nama_sekolah.required'     => 'Nama sekolah wajib diisi.',
            'npsn.required'             => 'NPSN wajib diisi.',
            'alamat.required'           => 'Alamat sekolah wajib diisi.',
            'tahun_berdiri.numeric'     => 'Tahun berdiri harus berupa angka.',
            'logo.image'                => 'Logo harus berupa file gambar.',
            'foto.image'                => 'Foto gedung harus berupa file gambar.',
            'foto_kepala_sekolah.image' => 'Foto kepala sekolah harus berupa file gambar.',
        ]);

        // 2. Ambil data profil pertama atau buat baru jika belum ada
        $profilSekolah = ProfileSekolah::first();

        if (!$profilSekolah) {
            $profilSekolah = new ProfileSekolah();
        }

        // 3. Assign field data teks
        $profilSekolah->nama_sekolah   = $request->nama_sekolah;
        $profilSekolah->kepala_sekolah = $request->kepala_sekolah;
        $profilSekolah->npsn           = $request->npsn;
        $profilSekolah->kontak         = $request->kontak;
        $profilSekolah->alamat         = $request->alamat;
        $profilSekolah->visi           = $request->visi;
        $profilSekolah->misi           = $request->misi;
        $profilSekolah->tahun_berdiri  = $request->tahun_berdiri;
        $profilSekolah->deskripsi      = $request->deskripsi;

        // 4. Upload file logo jika disertakan
        if ($request->hasFile('logo')) {
            if ($profilSekolah->logo && str_starts_with($profilSekolah->logo, 'profil/') && Storage::disk('public')->exists($profilSekolah->logo)) {
                Storage::disk('public')->delete($profilSekolah->logo);
            }
            $profilSekolah->logo = $request->file('logo')->store('profil', 'public');
        }

        // 5. Upload foto gedung jika disertakan
        if ($request->hasFile('foto')) {
            if ($profilSekolah->foto && str_starts_with($profilSekolah->foto, 'profil/') && Storage::disk('public')->exists($profilSekolah->foto)) {
                Storage::disk('public')->delete($profilSekolah->foto);
            }
            $profilSekolah->foto = $request->file('foto')->store('profil', 'public');
        }

        // 6. Upload foto kepala sekolah jika disertakan
        if ($request->hasFile('foto_kepala_sekolah')) {
            if (!empty($profilSekolah->foto_kepala_sekolah) && str_starts_with($profilSekolah->foto_kepala_sekolah, 'profil/') && Storage::disk('public')->exists($profilSekolah->foto_kepala_sekolah)) {
                Storage::disk('public')->delete($profilSekolah->foto_kepala_sekolah);
            }
            $profilSekolah->foto_kepala_sekolah = $request->file('foto_kepala_sekolah')->store('profil', 'public');
        }

        // 7. Simpan perubahan secara permanen ke database
        $profilSekolah->save();
        // dd($profilSekolah);

        // 8. Redirect kembali ke halaman index profil dengan pesan sukses
        return redirect()->route('admin.profile')->with('success', 'Profil sekolah berhasil diperbarui!');
    }
}
