<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfildesaController;
use App\Http\Controllers\UmkmGambarController;
use App\Http\Controllers\InfowilayahController;
use App\Http\Controllers\PotensidesaController;
use App\Http\Controllers\KategoriumkmController;
use App\Http\Controllers\LoginPetugasController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KategoripotensiController;
use App\Http\Controllers\KategorifasilitasController;
use App\Http\Controllers\PotensidesagambarController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WisatawanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


// Auth
Route::get('auth', [GoogleAuthController::class, 'index'])->name('auth');
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

// Register Send Mail
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerProses']);

// Login Wisatawan
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginProses']);

// Email Verify
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Logout
Route::get('logout', [GoogleAuthController::class, 'logout'])->name('logout');


// route front end
Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/profil', [ProfildesaController::class, 'detailprofil']);

Route::get('/potensi', [HomeController::class, 'potensidesa']);
Route::get('/potensidetail/{slug}', [PotensidesaController::class, 'detailpotensi']);

Route::get('/umkm', [HomeController::class, 'umkm']);
Route::get('/umkmdetail/{slug}', [UmkmController::class, 'detailumkm']);

Route::get('/berita', [HomeController::class, 'berita']);
Route::get('/fasilitas', [HomeController::class, 'fasilitas']);

Route::get('/review/{slug}', [ReviewController::class, 'index'])->name('review');
Route::get('review/7/fetch', [ReviewController::class, 'fetch'])->name('fetch.review');
Route::post('review/store', [ReviewController::class, 'store'])->name('save.review');

Route::get('/beritadetail/{slug}', [BeritaController::class, 'detailberita']);

// route admin
Route::group(['prefix' => 'admin'], function () {


    //Login Petugas
    Route::get('/loginpetugas', [LoginPetugasController::class, 'index'])->name('loginpetugas');
    Route::post('/loginpetugas', [LoginPetugasController::class, 'login']);
    Route::post('/logoutpetugas', [LoginPetugasController::class, 'logout'])->name('logoutpetugas');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('navbar', [NavbarController::class, 'index'])->name('navbar');
    Route::get('navbar/fetch', [NavbarController::class, 'fetch'])->name('fetch.navbar');
    Route::post('navbar/store', [NavbarController::class, 'store'])->name('save.navbar');
    Route::delete('navbar/delete', [NavbarController::class, 'destroy'])->name('delete.navbar');
    Route::get('navbar/edit', [NavbarController::class, 'edit'])->name('edit.navbar');
    Route::post('navbar/update', [NavbarController::class, 'update'])->name('update.navbar');

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

    Route::get('footer', [FooterController::class, 'index'])->name('footer');
    Route::get('footer/fetch', [FooterController::class, 'fetch'])->name('fetch.footer');
    Route::get('footer/show', [FooterController::class, 'show'])->name('detail.footer');
    Route::post('footer/store', [FooterController::class, 'store'])->name('save.footer');
    Route::delete('footer/delete', [FooterController::class, 'destroy'])->name('delete.footer');
    Route::get('footer/edit', [FooterController::class, 'edit'])->name('edit.footer');
    Route::post('footer/update', [FooterController::class, 'update'])->name('update.footer');

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

    Route::get('umkm', [UmkmController::class, 'index'])->name('umkm');
    Route::get('umkm/fetch', [UmkmController::class, 'fetch'])->name('fetch.umkm');
    Route::get('umkm/show', [UmkmController::class, 'show'])->name('detail.umkm');
    Route::post('umkm/store', [UmkmController::class, 'store'])->name('save.umkm');
    Route::delete('umkm/delete', [UmkmController::class, 'destroy'])->name('delete.umkm');
    Route::get('umkm/edit', [UmkmController::class, 'edit'])->name('edit.umkm');
    Route::post('umkm/update', [UmkmController::class, 'update'])->name('update.umkm');

    Route::get('kategoriumkm', [KategoriumkmController::class, 'index'])->name('kategoriumkm');
    Route::get('kategoriumkm/fetch', [KategoriumkmController::class, 'fetch'])->name('fetch.kategoriumkm');
    Route::post('kategoriumkm/store', [KategoriumkmController::class, 'store'])->name('save.kategoriumkm');
    Route::delete('kategoriumkm/delete', [KategoriumkmController::class, 'destroy'])->name('delete.kategoriumkm');
    Route::get('kategoriumkm/edit', [KategoriumkmController::class, 'edit'])->name('edit.kategoriumkm');
    Route::post('kategoriumkm/update', [KategoriumkmController::class, 'update'])->name('update.kategoriumkm');

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

    Route::get('petugas', [PetugasController::class, 'index'])->name('petugas');
    Route::get('petugas/fetch', [PetugasController::class, 'fetch'])->name('fetch.petugas');
    Route::get('petugas/show', [PetugasController::class, 'show'])->name('detail.petugas');
    Route::post('petugas/store', [PetugasController::class, 'store'])->name('save.petugas');
    Route::delete('petugas/delete', [PetugasController::class, 'destroy'])->name('delete.petugas');
    Route::get('petugas/edit', [PetugasController::class, 'edit'])->name('edit.petugas');
    Route::post('petugas/update', [PetugasController::class, 'update'])->name('update.petugas');

    Route::get('wisatawan/', [WisatawanController::class, 'index'])->name('wisatawan');
    Route::get('wisatawan/7/fetch', [WisatawanController::class, 'fetch'])->name('fetch.wisatawan');
    Route::delete('wisatawan/delete', [WisatawanController::class, 'destroy'])->name('delete.wisatawan');
    Route::get('wisatawan/7/edit', [WisatawanController::class, 'edit'])->name('edit.wisatawan');
    Route::post('wisatawan/update', [WisatawanController::class, 'update'])->name('update.wisatawan');

    Route::get('/potensigambar/{id_potensidesa}', [PotensidesagambarController::class, 'index'])->name('potensigambar');
    Route::get('potensigambar/7/fetch', [PotensidesagambarController::class, 'fetch'])->name('fetch.potensigambar');
    Route::post('potensigambar/store', [PotensidesagambarController::class, 'store'])->name('save.potensigambar');
    Route::delete('potensigambar/delete', [PotensidesagambarController::class, 'destroy'])->name('delete.potensigambar');
    Route::get('potensigambar/7/edit', [PotensidesagambarController::class, 'edit'])->name('edit.potensigambar');
    Route::post('potensigambar/update', [PotensidesagambarController::class, 'update'])->name('update.potensigambar');

    Route::get('umkmgambar/{id_umkm}', [UmkmGambarController::class, 'index'])->name('umkmgambar');
    Route::get('umkmgambar/7/fetch', [UmkmGambarController::class, 'fetch'])->name('fetch.umkmgambar');
    Route::post('umkmgambar/store', [UmkmGambarController::class, 'store'])->name('save.umkmgambar');
    Route::delete('umkmgambar/delete', [UmkmGambarController::class, 'destroy'])->name('delete.umkmgambar');
    Route::get('umkmgambar/7/edit', [UmkmGambarController::class, 'edit'])->name('edit.umkmgambar');
    Route::post('umkmgambar/update', [UmkmGambarController::class, 'update'])->name('update.umkmgambar');

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