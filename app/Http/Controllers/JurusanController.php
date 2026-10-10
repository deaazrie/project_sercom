<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Jurusan::query();

        // Contoh filter jika diperlukan (misal pencarian berdasarkan nama)
        if ($request->filled('search')) {
            $query->where('nama_jurusan', 'like', '%' . $request->search . '%');
        }

        $jurusans = $query->get();
        $title = "Data Program Keahlian";

        return view('admin.jurusan.index', compact('jurusans', 'title'));
    }

    /**
     * Show the form for creating or editing the resource.
     */
    public function addEdit($id = null)
    {
        try {
            $jurusan = $id
                ? Jurusan::findOrFail(Crypt::decrypt($id))
                : null;
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.jurusan.index')
                ->with('error', 'Data program keahlian tidak ditemukan');
        }

        return view('admin.jurusan.add-edit', compact('jurusan'));
    }

    /**
     * Store or update the resource in storage.
     */
    public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $jurusan = Jurusan::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.jurusan.index')
                    ->with('error', 'Data program keahlian tidak ditemukan');
            }
        } else {
            $jurusan = new Jurusan();
        }

        // Validasi input
        $request->validate([
            'nama_jurusan' => 'required|string|max:255',
            'kode_ikon'    => 'required|string|max:50',
            'deskripsi'    => 'required|string',
        ], [
            'nama_jurusan.required' => 'Nama jurusan wajib diisi.',
            'kode_ikon.required'    => 'Kode ikon wajib diisi.',
            'deskripsi.required'    => 'Deskripsi wajib diisi.',
        ]);

        // Masukkan data ke model
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->kode_ikon = $request->kode_ikon;
        $jurusan->deskripsi = $request->deskripsi;

        // Simpan data
        $jurusan->save();

        return redirect()
            ->route('admin.jurusan.index')
            ->with(
                'success',
                $id
                    ? 'Data program keahlian berhasil diperbarui.'
                    : 'Data program keahlian berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $jurusan = Jurusan::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.jurusan.index')
                ->with('error', 'Data program keahlian tidak ditemukan');
        }

        return view('admin.jurusan.detail', compact('jurusan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $jurusan = Jurusan::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.jurusan.index')
                ->with('error', 'Data program keahlian tidak ditemukan.');
        }

        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data program keahlian berhasil dihapus.');
    }
}
