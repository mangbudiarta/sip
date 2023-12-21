<?php

use App\Models\Loginpetugas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\InfowilayahController;
use App\Http\Controllers\LoginPetugasController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\KategorifasilitasController;
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




// Auth Petugas
// Route::get('/login', [LoginPetugasController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginPetugasController::class, 'login']);





// route front end
Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/profil', function () {
    return view('frontend/pages/profil', [
        "title" => "Profil"
    ]);
});
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

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('navbar', function () {
        return view('admin/pages/navbar', [
            "title" => "Navbar"
        ]);
    });

    Route::get('banner', [BannerController::class, 'index'])->name('banner');
    Route::get('banner/fetch', [BannerController::class, 'fetch'])->name('fetch.banner');
    Route::get('banner/show', [BannerController::class, 'show'])->name('detail.banner');
    Route::post('banner/store', [BannerController::class, 'store'])->name('save.banner');
    Route::delete('banner/delete', [BannerController::class, 'destroy'])->name('delete.banner');
    Route::get('banner/edit', [BannerController::class, 'edit'])->name('edit.banner');
    Route::post('banner/update', [BannerController::class, 'update'])->name('update.banner');

    Route::get('profildesa', function () {
        return view('admin/pages/profildesa', [
            "title" => "Profil Desa"
        ]);
    });

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
