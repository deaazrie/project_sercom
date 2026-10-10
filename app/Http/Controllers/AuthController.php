<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman/form login
     */
    public function index()
    {
        // Auth::logout();
        // return view('auth.login');
        $profil = DB::table('profil_sekolah')->first();
        return view('auth.login', compact('profil'));
    }

    /**
     * Memproses data login (Submit Form)
     */
 /**
     * Memproses data login (Submit Form)
     */
    public function processLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username wajib diisi.',
                'password.required' => 'Password wajib diisi.',
            ]
        );

        if (Auth::attempt($credentials)) {

            // CEK STATUS AKUN: Jika status tidak aktif, langsung logout dan tolak masuk
            if (strtolower(Auth::user()->status) !== 'aktif') {
                Auth::logout();

                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'username' => 'Akun Anda telah dinonaktifkan. Silakan hubungi Administrator.',
                ])->onlyInput('username');
            }

            // Jika aktif, lanjutkan masuk ke dashboard
            $request->session()->regenerate();

            return redirect()->intended(route('admin.dashboard'))
                ->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '!');
        }

        return back()->withErrors(
            [
                'username' => 'Kombinasi username atau kata sandi tidak sesuai.',
            ]
        )->onlyInput('username');
    }

    /**
     * Memproses Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing.index')
            ->with('success', 'Anda telah berhasil keluar dari sistem.');
    }
}
