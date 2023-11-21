<?php

use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategorifasilitasController;
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

// route front end
Route::get('/', function () {
    return view('frontend/home',[
        "title" => "Home"
    ]);
});

Route::get('/profil', function () {
    return view('frontend/pages/profil',[
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

Route::get('/fasilitas', [HomeController::class, 'fasilitas']);

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

// route admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', function () {
        return view('admin/dashboard',[
            "title" => "Dashboard"
        ]);
    });
    Route::get('navbar', function () {
        return view('admin/pages/navbar',[
            "title" => "Navbar"
        ]);
    });
    Route::get('banner', function () {
        return view('admin/pages/banner',[
            "title" => "Banner"
        ]);
    });
    Route::get('profildesa', function () {
        return view('admin/pages/profildesa',[
            "title" => "Profil Desa"
        ]);
    });
    Route::get('infowilayah', function () {
        return view('admin/pages/infowilayah',[
            "title" => "Info Wilayah"
        ]);
    });
    Route::get('footer', function () {
        return view('admin/pages/footer',[
            "title" => "Footer"
        ]);
    });
    Route::get('potensidesa', function () {
        return view('admin/potensidesa/index',[
            "title" => "Potensi Desa"
        ]);
    });
    Route::get('kategoripotensi', function () {
        return view('admin/potensidesa/kategoripotensi',[
            "title" => "Kategori Potensi Desa"
        ]);
    });
    Route::get('umkm', function () {
        return view('admin/umkm/index',[
            "title" => "UMKM"
        ]);
    });
    Route::get('kategoriumkm', function () {
        return view('admin/umkm/kategoriumkm',[
            "title" => "Kategori UMKM"
        ]);
    });
    Route::get('berita', function () {
        return view('admin/berita/index',[
            "title" => "Berita"
        ]);
    });
    Route::get('kategoriberita', function () {
        return view('admin/berita/kategoriberita',[
            "title" => "Kategori Berita"
        ]);
    });
    Route::get('petugas', function () {
        return view('admin/pages/petugas',[
            "title" => "Petugas"
        ]);
    });
    Route::get('wisatawan', function () {
        return view('admin/pages/wisatawan',[
            "title" => "wisatawan"
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
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas');
    Route::get('fasilitas/fetch', [FasilitasController::class, 'fetch'])->name('fetch.fasilitas');
    Route::get('fasilitas/show', [FasilitasController::class, 'show'])->name('detail.fasilitas');
    Route::post('fasilitas/store', [FasilitasController::class, 'store'])->name('save.fasilitas');
    Route::delete('fasilitas/delete', [FasilitasController::class, 'destroy'])->name('delete.fasilitas');
    Route::get('fasilitas/edit', [FasilitasController::class, 'edit'])->name('edit.fasilitas');
    Route::post('fasilitas/update', [FasilitasController::class, 'update'])->name('update.fasilitas');

    Route::get('kategorifasilitas', [KategorifasilitasController::class, 'index'])->name('kategorifasilitas');
    Route::get('kategorifasilitas/fetch', [KategorifasilitasController::class, 'fetch'])->name('fetch.kategorifasilitas');
    Route::post('kategorifasilitas/store', [KategorifasilitasController::class, 'store'])->name('save.kategorifasilitas');
    Route::delete('kategorifasilitas/delete', [KategorifasilitasController::class, 'destroy'])->name('delete.kategorifasilitas');
    Route::get('kategorifasilitas/edit', [KategorifasilitasController::class, 'edit'])->name('edit.kategorifasilitas');
    Route::post('kategorifasilitas/update', [KategorifasilitasController::class, 'update'])->name('update.kategorifasilitas');
});