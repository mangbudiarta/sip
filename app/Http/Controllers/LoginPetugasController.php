<?php

namespace App\Http\Controllers;

use App\Models\Loginpetugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginPetugasController extends Controller
{
    public function showLoginForm()
    {
        $data['title'] = 'Login Page Petugas';
        return view('auth.loginpetugas', $data);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Proses autentikasi
        if (Loginpetugas::attempt($credentials)) {
            // Jika berhasil login
            return redirect()->route('/'); // Gantilah 'home' dengan nama route yang sesuai
        }

        // Jika gagal login
        return back()->withErrors(['email' => 'Email atau password salah']);
    }
}