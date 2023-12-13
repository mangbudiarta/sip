<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfowilayahController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KategorifasilitasController;
use App\Http\Controllers\ProfildesaController;
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
Route::get('/', [HomeController::class, 'index']);

Route::get('/profil', [ProfildesaController::class, 'detailprofil']);

Route::get('/potensi', function () {
    return view('frontend/potensi/index', [
        "title" => "Potensi"
    ]);
});
Route::get('/potensidetail', function () {
    return view('frontend/potensi/potensidetail', [
        "title" => "Potensi"
    ]);
});
Route::get('/umkm', function () {
    return view('frontend/umkm/index', [
        "title" => "Umkm"
    ]);
});
Route::get('/umkmdetail', function () {
    return view('frontend/umkm/umkmdetail', [
        "title" => "Umkm"
    ]);
});

Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/fasilitas', [HomeController::class, 'fasilitas']);

Route::get('/review', function () {
    return view('frontend/potensi/review', [
        "title" => "review"
    ]);
});
Route::get('/beritadetail/{slug}', [BeritaController::class, 'detailberita']);

// route admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('dashboard', function () {
        return view('admin/dashboard', [
            "title" => "Dashboard"
        ]);
    });
    Route::get('navbar', function () {
        return view('admin/pages/navbar', [
            "title" => "Navbar"
        ]);
    });

    Route::get('profildesa', [ProfildesaController::class, 'index'])->name('profildesa');
    Route::get('profildesa/fetch', [ProfildesaController::class, 'fetch'])->name('fetch.profildesa');
    Route::get('profildesa/show', [ProfildesaController::class, 'show'])->name('detail.profildesa');
    Route::post('profildesa/store', [ProfildesaController::class, 'store'])->name('save.profildesa');
    Route::delete('profildesa/delete', [ProfildesaController::class, 'destroy'])->name('delete.profildesa');
    Route::get('profildesa/edit', [ProfildesaController::class, 'edit'])->name('edit.profildesa');
    Route::post('profildesa/update', [ProfildesaController::class, 'update'])->name('update.profildesa');

    Route::get('banner', [BannerController::class, 'index'])->name('banner');
    Route::get('banner/fetch', [BannerController::class, 'fetch'])->name('fetch.banner');
    Route::get('banner/show', [BannerController::class, 'show'])->name('detail.banner');
    Route::post('banner/store', [BannerController::class, 'store'])->name('save.banner');
    Route::delete('banner/delete', [BannerController::class, 'destroy'])->name('delete.banner');
    Route::get('banner/edit', [BannerController::class, 'edit'])->name('edit.banner');
    Route::post('banner/update', [BannerController::class, 'update'])->name('update.banner');

    Route::get('infowilayah', [InfowilayahController::class, 'index'])->name('infowilayah');
    Route::get('infowilayah/fetch', [InfowilayahController::class, 'fetch'])->name('fetch.infowilayah');
    Route::get('infowilayah/show', [InfowilayahController::class, 'show'])->name('detail.infowilayah');
    Route::post('infowilayah/store', [InfowilayahController::class, 'store'])->name('save.infowilayah');
    Route::delete('infowilayah/delete', [InfowilayahController::class, 'destroy'])->name('delete.infowilayah');
    Route::get('infowilayah/edit', [InfowilayahController::class, 'edit'])->name('edit.infowilayah');
    Route::post('infowilayah/update', [InfowilayahController::class, 'update'])->name('update.infowilayah');

    Route::get('footer', function () {
        return view('admin/pages/footer', [
            "title" => "Footer"
        ]);
    });
    Route::get('potensidesa', function () {
        return view('admin/potensidesa/index', [
            "title" => "Potensi Desa"
        ]);
    });
    Route::get('kategoripotensi', function () {
        return view('admin/potensidesa/kategoripotensi', [
            "title" => "Kategori Potensi Desa"
        ]);
    });
    Route::get('umkm', function () {
        return view('admin/umkm/index', [
            "title" => "UMKM"
        ]);
    });
    Route::get('kategoriumkm', function () {
        return view('admin/umkm/kategoriumkm', [
            "title" => "Kategori UMKM"
        ]);
    });
    Route::get('berita', [BeritaController::class, 'index'])->name('berita');
    Route::get('berita/fetch', [BeritaController::class, 'fetch'])->name('fetch.berita');
    Route::get('berita/show', [BeritaController::class, 'show'])->name('detail.berita');
    Route::post('berita/store', [BeritaController::class, 'store'])->name('save.berita');
    Route::delete('berita/delete', [BeritaController::class, 'destroy'])->name('delete.berita');
    Route::get('berita/edit', [BeritaController::class, 'edit'])->name('edit.berita');
    Route::post('berita/update', [BeritaController::class, 'update'])->name('update.berita');

    Route::get('kategoriberita', [KategoriberitaController::class, 'index'])->name('kategoriberita');
    Route::get('kategoriberita/fetch', [KategoriberitaController::class, 'fetch'])->name('fetch.kategoriberita');
    Route::post('kategoriberita/store', [KategoriberitaController::class, 'store'])->name('save.kategoriberita');
    Route::delete('kategoriberita/delete', [KategoriberitaController::class, 'destroy'])->name('delete.kategoriberita');
    Route::get('kategoriberita/edit', [KategoriberitaController::class, 'edit'])->name('edit.kategoriberita');
    Route::post('kategoriberita/update', [KategoriberitaController::class, 'update'])->name('update.kategoriberita');
    Route::get('petugas', function () {
        return view('admin/pages/petugas', [
            "title" => "Petugas"
        ]);
    });
    Route::get('wisatawan', function () {
        return view('admin/pages/wisatawan', [
            "title" => "wisatawan"
        ]);
    });
    Route::get('potensigambar', function () {
        return view('admin/potensidesa/potensigambar', [
            "title" => "Gambar"
        ]);
    });
    Route::get('umkmgambar', function () {
        return view('admin/umkm/umkmgambar', [
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