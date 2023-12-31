<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Infowilayah;
use App\Models\Kategoriberita;
use App\Models\Kategorifasilitas;

use Illuminate\Support\Facades\Auth;
use App\Models\Kategoripotensi;
use App\Models\Potensidesa;
use App\Models\Umkm;
use App\Models\Kategoriumkm;
use App\Models\Profildesa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Fungsi mengirimkan array data ke view home 
     * @param -
     * @return view home dengan data array
     */
    public function index()
    {
        // return view fasilitas dengan mengirmkan data array
        return view('frontend.home', [
            // array title berisi string 'home'       
            'title' => 'Home',

            //data from berita model
            'berita' => Berita::take(3)->select('id_berita', 'judulberita', 'gambarcover', 'isiberita', 'slug', 'created_at')->orderBy('created_at', 'desc')->get(),

            //data from profildesa model
            'profildesa' => Profildesa::all(),

            // data from Infowilayah Model
            'infowilayah' => Infowilayah::all(),

            //data from banner model
            'banner' => Banner::all(),

            //data from potensidesa model
            'potensidesa' => Potensidesa::take(5)->select('id_potensidesa', 'namapotensi', 'gambarcover', 'deskripsi', 'slug', 'created_at')->orderBy('created_at', 'desc')->get(),

            //data from umkm model
            'umkm' => Umkm::take(5)->get()


        ]);
    }

    /**
     * Fungsi menampilkan semua data fasilitas dan hasil pencarian 
     * @param obyek Request dengan $request berisi data formulir pencarian
     * @return view fasilitas dengan data array
     */
    public function fasilitas(Request $request)
    {
        // mengisi $keyword dari form cari name:keyword
        $keyword = $request->input('keyword');
        // mengisi $kategori dari form cari name:id_kategori
        $kategori = $request->input('id_kategori');

        // query builder model Fasilitas, return semua data
        $query = Fasilitas::query();

        // jika $keyword berisi data
        if ($keyword) {
            // lakukan query pencarian namafasilitas berdasarkan $keyword
            $query->where('namafasilitas', 'like', '%' . $keyword . '%');
        }

        // jika $kategori berisi data
        if ($kategori) {
            // lakukan query pencarian id_kategori berdasarkan $kategori
            $query->where('id_kategori', $kategori);
        }

        // masukan hasil pencarian ke $results dengan urutkan data dari yang terbaru
        $results = $query->orderBy('created_at', 'desc')->get();
        // return view fasilitas dengan mengirmkan data array
        return view('frontend.pages.fasilitas', [
            // array key fasilitas berisi $results, jika kosong key fasilitas berisi array kosong
            'fasilitas' => $results->isEmpty() ? [] : $results,
            // array key kategori berisi semua data dari Kategorifasilitas
            'kategori' => Kategorifasilitas::all(),
            // array key title berisi string 'Fasilitas'
            'title' => 'Fasilitas',
            // array key message berisi string 'Data tidak ditemukan' jika kosong, dan null jika tidak kosong
            'message' => $results->isEmpty() ? 'Data tidak ditemukan' : null,
        ]);
    }

    /**
     * Fungsi menampilkan semua data berita dan hasil pencarian 
     * @param obyek Request dengan $request berisi data formulir pencarian
     * @return view berita dengan data array
     */
    public function berita(Request $request)
    {
        // mengisi $keyword dari form cari name:keyword
        $keyword = $request->input('keyword');
        // mengisi $kategori dari form cari name:id_kategori
        $kategori = $request->input('id_kategori');

        // query builder model Berita, return beberapa data sesuai colom
        $query = Berita::query();
        $query->select('id_berita', 'judulberita', 'gambarcover', 'isiberita', 'slug');

        // jika $keyword berisi data
        if ($keyword) {
            // lakukan query pencarian judulberita berdasarkan $keyword
            $query->where('judulberita', 'like', '%' . $keyword . '%');
        }

        // jika $kategori berisi data
        if ($kategori) {
            // lakukan query pencarian id_kategori berdasarkan $kategori
            $query->where('id_kategori', $kategori);
        }

        // masukan hasil pencarian ke $results dengan urutkan data dari yang terbaru
        $results = $query->orderBy('created_at', 'desc')->get();
        // return view berita dengan mengirmkan data array
        return view('frontend.berita.index', [
            // array key berita berisi $results, jika kosong key berita berisi array kosong
            'berita' => $results->isEmpty() ? [] : $results,
            // array key kategori berisi semua data dari berita
            'kategori' => Kategoriberita::all(),
            // array key title berisi string 'Berita'
            'title' => 'Berita',
            // array key message berisi string 'Data tidak ditemukan' jika kosong, dan null jika tidak kosong
            'message' => $results->isEmpty() ? 'Data tidak ditemukan' : null,
        ]);
    }

    /**
     * Fungsi menampilkan semua data potensidesa dan hasil pencarian 
     * @param obyek Request dengan $request berisi data formulir pencarian
     * @return view potensidesa dengan data array
     */
    public function potensidesa(Request $request)
    {
        // mengisi $keyword dari form cari name:keyword
        $keyword = $request->input('keyword');
        // mengisi $kategori dari form cari name:id_kategori
        $kategori = $request->input('id_kategori');

        // query builder model potensidesa, return beberapa data sesuai colom
        $query = Potensidesa::query();
        $query->select('id_potensidesa', 'namapotensi', 'gambarcover', 'deskripsi', 'slug', 'created_at');

        // jika $keyword berisi data
        if ($keyword) {
            // lakukan query pencarian namapotensi berdasarkan $keyword
            $query->where('namapotensi', 'like', '%' . $keyword . '%');
        }

        // jika $kategori berisi data
        if ($kategori) {
            // lakukan query pencarian id_kategori berdasarkan $kategori
            $query->where('id_kategori', $kategori);
        }

        // masukan hasil pencarian ke $results dengan urutkan data dari yang terbaru
        $results = $query->orderBy('created_at', 'desc')->get();
        // return view potensi dengan mengirmkan data array
        return view('frontend.potensi.index', [
            // array key potensi berisi $results, jika kosong key potensi berisi array kosong
            'potensidesa' => $results->isEmpty() ? [] : $results,
            // array key kategori berisi semua data dari potensi
            'kategori' => Kategoripotensi::all(),
            // array key title berisi string 'potensi'
            'title' => 'potensi desa',
            // array key message berisi string 'Data tidak ditemukan' jika kosong, dan null jika tidak kosong
            'message' => $results->isEmpty() ? 'Data tidak ditemukan' : null,
        ]);
    }

    /**
     * Fungsi menampilkan semua data umkm dan hasil pencarian 
     * @param obyek Request dengan $request berisi data formulir pencarian
     * @return view umkm dengan data array
     */
    public function umkm(Request $request)
    {
        // mengisi $keyword dari form cari name:keyword
        $keyword = $request->input('keyword');
        // mengisi $kategori dari form cari name:id_kategori
        $kategori = $request->input('id_kategori');

        // query builder model Umkm, return semua data
        $query = Umkm::query();

        // jika $keyword berisi data
        if ($keyword) {
            // lakukan query pencarian namaumkm berdasarkan $keyword
            $query->where('namaumkm', 'like', '%' . $keyword . '%');
        }

        // jika $kategori berisi data
        if ($kategori) {
            // lakukan query pencarian id_kategori berdasarkan $kategori
            $query->where('id_kategori', $kategori);
        }

        // masukan hasil pencarian ke $results dengan urutkan data dari yang terbaru
        $results = $query->orderBy('created_at', 'desc')->get();
        // return view umkm dengan mengirmkan data array
        return view('frontend.umkm.index', [
            // array key umkm berisi $results, jika kosong key umkm berisi array kosong
            'umkm' => $results->isEmpty() ? [] : $results,
            // array key kategori berisi semua data dari Kategoriumkm
            'kategori' => Kategoriumkm::all(),
            // array key title berisi string 'Umkm'
            'title' => 'Umkm',
            // array key message berisi string 'Data tidak ditemukan' jika kosong, dan null jika tidak kosong
            'message' => $results->isEmpty() ? 'Data tidak ditemukan' : null,
        ]);
    }
}
