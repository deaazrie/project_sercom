<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
        $title = 'guru';

        $query = Guru::query();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $guru = $query->latest()->get();

        return view('admin.guru.index', compact('guru', 'title'));
    }


    /**
     * Form Tambah / Edit Guru
     */
    public function addEdit($id = null)
    {
        $guru = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $guru = Guru::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'Data guru tidak ditemukan');
            }
        }

        return view('admin.guru.add-edit', compact('guru'));
    }

    /**
     * Simpan Data Guru (Create & Update)
     */
   public function save(Request $request, $id = null)
    {
        $decryptedId = null;

        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $guru = Guru::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.guru.index')
                    ->with('error', 'Data guru tidak ditemukan');
            }
        } else {
            $guru = new Guru();
        }

        // Validasi Input
        $request->validate([
            'nama_guru' => 'required|string|max:40',
            'mapel'     => 'required|string|max:40',
            'nip'       => 'nullable|unique:guru,nip,' . $decryptedId . ',id',
            'kategori'  => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'nama_guru.required' => 'Nama guru wajib diisi.',
            'mapel.required'     => 'Mata pelajaran wajib diisi.',
            'nip.unique'         => 'NIP sudah terdaftar pada guru lain.',
            'kategori.required'  => 'Kategori pegawai wajib dipilih.',
            'foto.image'         => 'Foto harus berupa file gambar (JPG, PNG).',
            'foto.max'           => 'Ukuran foto maksimal 2MB.',
        ]);

        $guru->nama_guru = $request->nama_guru;
        $guru->nip       = $request->nip;
        $guru->mapel     = $request->mapel;
        $guru->kategori  = $request->kategori;

        if ($request->hasFile('foto')) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
            $guru->foto = $request->file('foto')->store('guru', 'public');
        }

        $guru->save();

        return redirect()
            ->route('admin.guru.index')
            ->with(
                'success',
                $id
                    ? 'Data guru berhasil diperbarui.'
                    : 'Data guru berhasil disimpan.'
            );
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'detail';

        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::findOrFail($decryptedId);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        return view('admin.guru.detail', compact('guru', 'title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $guru = Guru::findOrFail($decryptedId);
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.guru.index')
                ->with('error', 'Data guru tidak ditemukan.');
        }

        if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }

}
