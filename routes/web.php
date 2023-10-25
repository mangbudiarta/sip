<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend/home',[
        "title" => "Home"
    ]);
});

Route::get('/profil', function () {
    return view('frontend/profil',[
        "title" => "Profil"
    ]);
});

Route::get('/potensi', function () {
    return view('frontend/potensi',[
        "title" => "Potensi"
    ]);
});

Route::get('/umkm', function () {
    return view('frontend/umkm',[
        "title" => "Umkm"
    ]);
});

Route::get('/berita', function () {
    return view('frontend/berita',[
        "title" => "Berita"
    ]);
});

Route::get('/kontak', function () {
    return view('frontend/kontak',[
        "title" => "Kontak"
    ]);
});