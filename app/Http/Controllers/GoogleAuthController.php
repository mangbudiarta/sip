<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{

    public function index()
    {
        $data['title'] = "Login Page";
        return view('auth.login', $data);
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {

            $google_user = Socialite::driver('google')->user();


            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);


                if ($new_user) {
                    Auth::login($new_user);
                    // Tambahkan notifikasi berhasil login
                    session()->flash('success', 'Selamat datang, ' . $new_user->name . '! Anda berhasil login.');
                } else {
                    // Tambahkan notifikasi kesalahan pembuatan pengguna
                    session()->flash('error', 'Terjadi kesalahan saat membuat pengguna.');
                }

                return redirect()->intended('/');
            } else {
                Auth::login($user);
            }

            return redirect()->intended('/');
        } catch (\Throwable $th) {
            dd('Something went wrong !!!' . $th->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}









 // if (Auth::login($user)) {
                //     // Tambahkan notifikasi berhasil login
                //     session()->flash('success', 'Selamat datang kembali, ' . $user->name . '! Anda berhasil login.');
                // } else {
                //     // Tambahkan notifikasi kesalahan login
                //     session()->flash('error', 'Terjadi kesalahan saat login.');
                // }












                // Auth::login($new_user);