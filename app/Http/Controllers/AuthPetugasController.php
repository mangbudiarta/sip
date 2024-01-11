<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthPetugasController extends Controller
{
    public function index()
    {
        $data['title'] = "Login Petugas";
        return view('auth.loginpetugas', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 3 characters',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('petugas')->attempt($credentials)) {
            // Jika login berhasil
            $petugas = Auth::guard('petugas')->user();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Wrong email or password',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('petugas')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginpetugas');
    }
}
