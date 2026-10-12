<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Jurusan;

class SiswaController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Siswa::query();

        if ($request->filled('filter_universal')) {
            $val = $request->filter_universal;

            if (in_array($val, ['Laki-Laki', 'Perempuan'])) {
                $query->where('jenis_kelamin', $val);
            } else {
                $query->where('tahun_masuk', $val);
            }
        }

        $listJenisKelamin = ['Laki-Laki', 'Perempuan'];
        $listTahun = Siswa::select('tahun_masuk')->distinct()->orderBy('tahun_masuk', 'desc')->pluck('tahun_masuk');

        $siswa = $query->get();
        $title = "Data Siswa";

        return view('admin.siswa.index', compact('siswa', 'title', 'listJenisKelamin', 'listTahun'));
    }

 public function addEdit($id = null)
    {
        $siswa = null;
        if ($id) {
            try {
                $decryptedId = Crypt::decrypt($id);
                $siswa = Siswa::findOrFail($decryptedId);
            } catch (\Exception $e) {
                return redirect()->route('admin.siswa.index')->with('error', 'Data siswa tidak ditemukan.');
            }
        }

        // Ambil data jurusan dari database untuk dropdown
        $jurusan = Jurusan::all();

        return view('admin.siswa.add-edit', compact('siswa', 'jurusan'));
    }

   public function save(Request $request, $id = null)
    {
        if ($id) {
            try {
                $id = Crypt::decrypt($id);
                $siswa = Siswa::findOrFail($id);
            } catch (\Exception $e) {
                return redirect()
                    ->route('admin.siswa.index')
                    ->with('error', 'Data siswa tidak ditemukan');
            }
        } else {
            $siswa = new Siswa();
        }

        // Validasi input (ditambah validasi jurusan_id)
        $request->validate([
            'nisn'          => 'required|digits:10|unique:siswa,nisn,' . ($id ?? 'NULL') . ',id',
            'nama_siswa'    => 'required|string|max:40',
            'kelas'         => 'required|string|max:50',
            'jurusan_id'    => 'required|exists:jurusan,id', // Pastikan nama tabel database jurusans sesuai
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_masuk'   => 'required|digits:4|integer',
        ], [
            'nisn.required'          => 'NISN wajib diisi.',
            'nisn.digits'            => 'NISN harus 10 digit angka.',
            'nisn.unique'            => 'NISN sudah terdaftar pada siswa lain.',
            'nama_siswa.required'    => 'Nama siswa wajib diisi.',
            'kelas.required'         => 'Kelas wajib diisi.',
            'jurusan_id.required'    => 'Jurusan wajib dipilih.',
            'jurusan_id.exists'      => 'Jurusan yang dipilih tidak valid.',
            'jenis_kelamin.required' => 'Pilih jenis kelamin.',
            'tahun_masuk.required'   => 'Tahun masuk wajib diisi.',
            'tahun_masuk.digits'     => 'Tahun masuk harus 4 digit angka.',
        ]);

        // Masukkan data ke model (ditambah jurusan_id)
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan_id = $request->jurusan_id; // Menyimpan ID jurusan ke database
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tahun_masuk = $request->tahun_masuk;

        $siswa->save();

        return redirect()
            ->route('admin.siswa.index')
            ->with(
                'success',
                $id
                    ? 'Data siswa berhasil diperbarui.'
                    : 'Data siswa berhasil disimpan.'
            );
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $siswa = Siswa::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan');
        }

        return view('admin.siswa.detail', compact('siswa'));
    }

    public function destroy($id)
    {
        try {
            $siswa = Siswa::findOrFail(Crypt::decrypt($id));
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.siswa.index')
                ->with('error', 'Data siswa tidak ditemukan.');
        }

        $siswa->delete();


        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
