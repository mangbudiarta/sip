<?php

namespace App\Http\Controllers;

use App\Models\Potensidesa;
use App\Models\Potensidesagambar;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/infowilayah
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index($id_potensidesa)
    {
        return view('frontend.potensi.review', [
            'potensidesa' => Potensidesa::select('id_potensidesa', 'namapotensi', 'gambarcover', 'deskripsi', 'slug')->where('id_potensidesa', $id_potensidesa)->first(),
            'gambarpotensi' => Potensidesagambar::select('id_potensidesa', 'gambar')->where('id_potensidesa', $id_potensidesa)->get(),
            'ratarata' => round(Review::where('id_potensidesa', $id_potensidesa)->avg('rating'), 2),
            'jumlahreview' => Review::where('id_potensidesa', $id_potensidesa)->count(),
            'review' => Review::select('id_potensidesa', 'rating')->where('id_potensidesa', $id_potensidesa)->get(),
            // mengisi array key: title dengan string 'Info Wilayah'
            'title' => 'Review Potensi',
            'review' => Review::all()
        ]);
    }

    /**
     * Fungsi mendapatkan semua Review
     * @param -
     * @return view datareview dengan array key:infowilayah
     */
    public function fetch(Request $request)
    {
        return view('frontend.potensi.datareview', [
            // mengisi array key:review dengan semua data dari model review
            'review' => Review::where('id_potensidesa', $request->id_potensidesa)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Fungsi mendapatkan semua Rating
     * @param -
     * @return view datarating dengan array key:feview
     */
    public function rating(Request $request)
    {
        return view('frontend.potensi.datarating', [
            'ratarata' => round(Review::where('id_potensidesa', $request->id_potensidesa)->avg('rating'), 2),
            'jumlahreview' => Review::where('id_potensidesa', $request->id_potensidesa)->count(),
        ]);
    }


    /**
     * Fungsi menyimpan data Review ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        try {
            // input data ke database dari model Review
            $result = Review::create($validateData);
        } catch (\Throwable $th) {
            // gagal input data, return status 500
            return response()->json([
                'status' => 500
            ]);
        }

        // Berhasil input data, return status 200
        if ($result) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi validasi form inputan user 
     * @param obyek Request $request berisi data formulir
     * @return data tervalidasi
     */
    public function validasiRules(Request $request)
    {
        return $request->validate([
            'id_wisatawan' => 'required',
            'id_potensidesa' => 'required',
            'rating' => 'integer|required',
            'review' => 'nullable'
        ]);
    }
}
