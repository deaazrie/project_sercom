<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class GaleriController extends Controller
{
    // public function index()
    // {
    //     $title = 'Guru';
    //     $galeri = Galeri::latest()->get();
    //     return view('admin.galeri.index', compact('galeri', 'title'));
    // }

    public function index(Request $request)
{
    // Sesuaikan nama Model-nya jika berbeda (misal: Galeri atau Gallery)
    $query = Galeri::query();

    // Filter berdasarkan Kategori jika dipilih
    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    // Ambil daftar kategori unik dari database untuk pilihan dropdown
    $listKategori = Galeri::select('kategori')->distinct()->pluck('kategori');

    $galeri = $query->latest()->get();

    return view('admin.galeri.index', compact('galeri', 'listKategori'));
}

    public function addEdit($id = null)
    {
        $galeri = null;
        $encryptedId = $id;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $galeri = Galeri::findOrFail($decryptedId);
            } catch (DecryptException $e) {
                return redirect()->route('admin.galeri.index')->with('error', 'Data galeri tidak ditemukan.');
            }
        }

        return view('admin.galeri.add-edit', compact('galeri', 'encryptedId'));
    }

   public function save(Request $request, $id = null)
    {
        $decryptedId = null;
        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
            } catch (DecryptException $e) {
                return redirect()->route('admin.galeri.index')->with('error', 'Data galeri tidak ditemukan.');
            }
        }

        $request->validate([
            'judul'      => 'required|string|max:255|unique:galeri,judul,' . ($decryptedId ?? 'NULL') . ',id',
            'keterangan' => 'required|string',
            'file'       => ($decryptedId ? 'nullable' : 'required') . '|string', // Diubah menjadi string karena berupa teks / link
            'kategori'   => 'required|in:Foto,Video',
            'tanggal'    => 'required|date',
        ], [
            'judul.required'      => 'Judul galeri wajib diisi.',
            'judul.unique'        => 'Judul galeri sudah terdaftar.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'file.required'       => 'File atau link YouTube wajib diisi.',
            'file.string'         => 'Format file harus berupa teks atau link yang valid.',
            'kategori.required'   => 'Kategori wajib dipilih.',
            'tanggal.required'    => 'Tanggal wajib diisi.',
        ]);

        $galeri = $decryptedId ? Galeri::findOrFail($decryptedId) : new Galeri();
        $galeri->judul      = $request->judul;
        $galeri->keterangan = $request->keterangan;
        $galeri->kategori   = $request->kategori;
        $galeri->tanggal    = $request->tanggal;

        if ($request->filled('file')) {

            if ($decryptedId && $galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }

            $galeri->file = $request->file;
        }

        $galeri->save();

        $pesan = $decryptedId ? 'Data galeri berhasil diperbarui!' : 'Data galeri berhasil ditambahkan!';
        return redirect()->route('admin.galeri.index')->with('success', $pesan);
    }

    public function detail($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);
            return view('admin.galeri.detail', compact('galeri'));
        } catch (DecryptException $e) {
            return redirect()->route('admin.galeri.index')->with('error', 'Data galeri tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $galeri = Galeri::findOrFail($decryptedId);

            if ($galeri->file && Storage::disk('public')->exists($galeri->file)) {
                Storage::disk('public')->delete($galeri->file);
            }

            $galeri->delete();
            return redirect()->route('admin.galeri.index')->with('success', 'Data galeri berhasil dihapus!');
        } catch (DecryptException $e) {
            return redirect()->route('admin.galeri.index')->with('error', 'Data galeri tidak ditemukan.');
        }
    }
}
