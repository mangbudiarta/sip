<?php

namespace App\Http\Controllers;

use App\Models\Kategorifasilitas;
use Illuminate\Http\Request;

class KategorifasilitasController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder fasilitas/kategorifasilitas
     * @param -
     * @return view index dengan array key:title
     */
    public function index()
    {
        return view('admin.fasilitas.kategorifasilitas', [
            // mengisi array key: title dengan string 'Kategori Fasilitas'
            'title' => "Kategori Fasilitas"
        ]);
    }
    
    /**
     * Fungsi mendapatkan semua data kategori fasilitas
     * @param -
     * @return view datakategori dengan array key:kategorifasilitas
     */
    public function fetch()
    {
        return view('admin.fasilitas.datakategori', [
            // mengisi array key:kategorifasilitas dengan semua data dari model Kategorifasilitas
            'kategorifasilitas' => Kategorifasilitas::all()
        ]);
    }

    /**
     * Fungsi menyimpan data kategorifasilitas ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        try {
            // input data ke database dari model Kategorifasilitas
            $result = Kategorifasilitas::create($validateData);
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
     * Fungsi menampilkan data kategorifasilitas sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data kategorifasilitas sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_kategori
        $id = $request->id_kategori;
        // mengisi $data dengan data kategorifasilitas sesuai id dari model Kategorifasilitas
		$data = Kategorifasilitas::find($id);
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
        // mengiai $category dengan dari model Kategorifasilitas sesuai id
        $category = Kategorifasilitas::find($request->id_kategori);

        try {
            // update data ke database dari model Kategorifasilitas
            $result = Kategorifasilitas::where('id_kategori', $category->id_kategori)->update($validateData);
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
     * Fungsi delete data kategorifasilitas sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_kategori
        $id = $request->id_kategori;
        
        try {
            // delete data pada database dari model Kategorifasilitas
            $result = Kategorifasilitas::destroy($id);
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