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
    return view('frontend/potensi/index',[
        "title" => "Potensi"
    ]);
});
Route::get('/potensidetail', function () {
    return view('frontend/potensi/potensidetail',[
        "title" => "Potensi"
    ]);
});


Route::get('/umkm', function () {
    return view('frontend/umkm/index',[
        "title" => "Umkm"
    ]);
});
Route::get('/umkmdetail', function () {
    return view('frontend/umkm/umkmdetail',[
        "title" => "Umkm"
    ]);
});

Route::get('/berita', function () {
    return view('frontend/berita/index',[
        "title" => "Berita"
    ]);
});

Route::get('/kontak', function () {
    return view('frontend/kontak',[
        "title" => "Kontak"
    ]);
});
Route::get('/review', function () {
    return view('frontend/potensi/review',[
        "title" => "review"
    ]);
});
Route::get('/beritadetail', function () {
    return view('frontend/berita/beritadetail',[
        "title" => "Judul Berita"
    ]);
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', function () {
        return view('admin/dashboard',[
            "title" => "Dashboard"
        ]);
    });
    Route::get('navbar', function () {
        return view('admin/navbar',[
            "title" => "Navbar"
        ]);
    });
    Route::get('banner', function () {
        return view('admin/banner',[
            "title" => "Banner"
        ]);
    });
    Route::get('profildesa', function () {
        return view('admin/profildesa',[
            "title" => "Profil Desa"
        ]);
    });
    Route::get('infowilayah', function () {
        return view('admin/infowilayah',[
            "title" => "Info Wilayah"
        ]);
    });
    Route::get('footer', function () {
        return view('admin/footer',[
            "title" => "Footer"
        ]);
    });
    Route::get('potensidesa', function () {
        return view('admin/potensidesa/potensidesa',[
            "title" => "Potensi Desa"
        ]);
    });
    Route::get('umkm', function () {
        return view('admin/umkm/umkm',[
            "title" => "UMKM"
        ]);
    });
    Route::get('berita', function () {
        return view('admin/berita/berita',[
            "title" => "Berita"
        ]);
    });
    Route::get('kategoriberita', function () {
        return view('admin/berita/kategoriberita',[
            "title" => "Kategori Berita"
        ]);
    });
    Route::get('petugas', function () {
        return view('admin/petugas',[
            "title" => "Petugas"
        ]);
    });
    Route::get('potensigambar', function () {
        return view('admin/potensidesa/potensigambar',[
            "title" => "Gambar"
        ]);
    });
    Route::get('umkmgambar', function () {
        return view('admin/umkm/umkmgambar',[
            "title" => "Gambar"
        ]);
    });
});