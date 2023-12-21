<?php

namespace App\Http\Controllers;

use App\Models\Kategoripotensi;
use Illuminate\Http\Request;

class KategoripotensiController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder potensidesa/kategoripotensidesa
     * @param -
     * @return view index dengan array key:title
     */
    public function index()
    {
        return view('admin.potensidesa.kategoripotensi', [
            // mengisi array key: title dengan string 'Kategori potensidesa'
            'title' => "Kategori potensidesa"
        ]);
    }
    
    /**
     * Fungsi mendapatkan semua data kategori potensi
     * @param -
     * @return view datakategori dengan array key:kategoripotensi
     */
    public function fetch()
    {
        return view('admin.potensidesa.datakategori', [
            // mengisi array key:kategoripotensi dengan beberapa data dari model Kategoripotensi
            'kategoripotensi' => Kategoripotensi::select('id_kategori', 'namakategori')->get()
        ]);
    }

    /**
     * Fungsi menyimpan data kategoripotensi ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        try {
            // input data ke database dari model Kategoripotensi
            $result = Kategoripotensi::create($validateData);
        } catch (\Throwable $th) {
            // gagal input data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // berhasil input data, return status 200
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi menampilkan data kategoripotensi sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data kategoripotensi sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_kategori
        $id = $request->id_kategori;
        // mengisi $data dengan data kategoripotensi sesuai id dari model Kategoripotensi
		$data = Kategoripotensi::find($id);
        // mengirim isi $data dengan json
		return response()->json($data);
    }

    /**
     * Fungsi update data ke database
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function update(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        // mengiai $category dengan dari model Kategoripotensi sesuai id
        $category = Kategoripotensi::find($request->id_kategori);

        try {
            // update data ke database dari model Kategoripotensi
            $result = Kategoripotensi::where('id_kategori', $category->id_kategori)->update($validateData);
        } catch (\Throwable $th) {
            // gagal update data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // berhasil update data, return status 200
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }
    
    /**
     * Fungsi delete data kategoripotensi sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_kategori
        $id = $request->id_kategori;
        
        try {
            // delete data pada database dari model Kategoripotensi
            $result = Kategoripotensi::destroy($id);
        } catch (\Throwable $th) {
             // gagal delete data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }
        
        // berhasil delete data, return status 200
        if($result){
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
    public function validasiRules(Request $request) {
        return $request->validate([
            'namakategori' => 'required|max:25'
        ]);
    }
}