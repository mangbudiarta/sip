<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfowilayahController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KategorifasilitasController;
use App\Http\Controllers\KategoripotensiController;
use App\Http\Controllers\PotensidesaController;
use App\Http\Controllers\PotensidesagambarController;
use App\Http\Controllers\ProfildesaController;
use App\Models\Potensidesagambar;
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
Route::get('/potensi', [HomeController::class, 'potensidesa']);
Route::get('/potensidetail/{slug}', [PotensidesaController::class, 'detailpotensi']);
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
    Route::get('potensidesa', [PotensidesaController::class, 'index'])->name('potensidesa');
    Route::get('potensidesa/fetch', [PotensidesaController::class, 'fetch'])->name('fetch.potensidesa');
    Route::get('potensidesa/show', [PotensidesaController::class, 'show'])->name('detail.potensidesa');
    Route::post('potensidesa/store', [PotensidesaController::class, 'store'])->name('save.potensidesa');
    Route::delete('potensidesa/delete', [PotensidesaController::class, 'destroy'])->name('delete.potensidesa');
    Route::get('potensidesa/edit', [PotensidesaController::class, 'edit'])->name('edit.potensidesa');
    Route::post('potensidesa/update', [PotensidesaController::class, 'update'])->name('update.potensidesa');

    Route::get('kategoripotensi', [KategoripotensiController::class, 'index'])->name('kategoripotensi');
    Route::get('kategoripotensi/fetch', [KategoripotensiController::class, 'fetch'])->name('fetch.kategoripotensi');
    Route::post('kategoripotensi/store', [KategoripotensiController::class, 'store'])->name('save.kategoripotensi');
    Route::delete('kategoripotensi/delete', [KategoripotensiController::class, 'destroy'])->name('delete.kategoripotensi');
    Route::get('kategoripotensi/edit', [KategoripotensiController::class, 'edit'])->name('edit.kategoripotensi');
    Route::post('kategoripotensi/update', [KategoripotensiController::class, 'update'])->name('update.kategoripotensi');
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
    Route::get('/potensigambar/{id_potensidesa}', [PotensidesagambarController::class, 'index'])->name('potensigambar');
    Route::get('potensigambar/7/fetch', [PotensidesagambarController::class, 'fetch'])->name('fetch.potensigambar');
    Route::post('potensigambar/store', [PotensidesagambarController::class, 'store'])->name('save.potensigambar');
    Route::delete('potensigambar/delete', [PotensidesagambarController::class, 'destroy'])->name('delete.potensigambar');
    Route::get('potensigambar/7/edit', [PotensidesagambarController::class, 'edit'])->name('edit.potensigambar');
    Route::post('potensigambar/update', [PotensidesagambarController::class, 'update'])->name('update.potensigambar');

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