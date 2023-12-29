<?php

namespace App\Http\Controllers;

use App\Models\Loginpetugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginPetugasController extends Controller
{
    public function index()
    {
        $data['title'] = 'Login Page Petugas';
        return view('auth.loginpetugas', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('petugas')->attempt($credentials)) {
            // Jika login berhasil
            $petugas = Auth::guard('petugas')->user();
            Session::put('petugas_nama', $petugas->nama); // Simpan nama petugas dalam sesi
            return redirect()->intended('/dashboard'); // Ganti '/dashboard' dengan route yang diinginkan
        }

        // Jika login gagal
        return back()->withErrors(['login' => 'Login failed. Please check your username and password.']);
    }
    public function logout()
    {
        Auth::guard('petugas')->logout();

        // Hapus sesi nama petugas
        Session::forget('petugas_nama');

        return redirect('/loginpetugas'); // Ganti '/loginpetugas' dengan route login petugas
    }
}
