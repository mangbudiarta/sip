<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Berita;
use App\Models\Fasilitas;
use App\Models\Infowilayah;
use App\Models\Kategoriberita;
use App\Models\Kategorifasilitas;
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
            //data from berita model
            'profildesa' => Profildesa::all(),

            'berita' => Berita::take(3)->select('id_berita', 'judulberita', 'gambarcover','isiberita','slug','created_at')->orderBy('created_at','desc')->get(),

            // data from Infowilayah Model
            'infowilayah' => Infowilayah::all(),

            //data from banner model
            'banner' => Banner::all()


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
}