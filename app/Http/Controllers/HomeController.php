<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kategorifasilitas;
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
        //$data = [];  // empty array
        //$data['fasilitas'] = Fasilitas::all();   //data from fasilitas table
        //return view('frontend.home',compact('data'));
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

        // 
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
        $results = $query->orderBy('created_at','desc')->get();
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
}