<?php

namespace App\Http\Controllers;

use App\Models\Potensidesa;
use App\Models\Potensidesagambar;
use Illuminate\Http\Request;

class PotensidesagambarController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/potensidesa
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index($id_potensidesa)
    {
        return view('admin.potensidesa.potensigambar', [
            // mengisi array key: title dengan string 'Potensi Gambar'
            'title' => 'Potensi Gambar',
            // mengisi array key:potensigambar dengan semua data dari model potensigambar
            'potensidesa' => Potensidesa::select('id_potensidesa', 'namapotensi')->where('id_potensidesa', $id_potensidesa )->first(),
        ]);
    }

    /**
     * Fungsi mendapatkan semua Potensi Gambar
     * @param -
     * @return view datagambar dengan array key:potensigambar
     */
    public function fetch(Request $request)
    {
        return view('admin.potensidesa.datagambar', [
            // mengisi array key:potensigambar dengan semua data dari model potensigambar
            'potensigambar' => Potensidesagambar::where('id_potensidesa', $request->id_potensidesa )->get(),
        ]);
    }

    /**
     * Fungsi menyimpan data potensigambar ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar']=$fileNameToStore;
        
        try {
            // input data ke database dari model Potensidesagambar
            $result = Potensidesagambar::create($validateData);
        } catch (\Throwable $th) {
            // gagal input data, return status 500
            return response()->json([
                'status' => 500
            ]);
        }

        // Berhasil input data, return status 200
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi menampilkan data potensigambar sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data potensigambar sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_potensigambar
        $id = $request->id_gambar;
        // mengisi $data dengan data potensigambar sesuai id dari model Potensidesagambar
		$data = Potensidesagambar::find($id);
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
        // mengiai $potensigambar dengan dari model Potensidesagambar sesuai id
        $potensigambar = Potensidesagambar::find($request->id_gambar);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $potensigambar->gambar;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar']=$fileNameToStore;
    
        try {
            // update data ke database dari model Potensidesagambar
            $result = Potensidesagambar::where('id_gambar',$potensigambar->id_gambar)->update($validateData);
        } catch (\Throwable $th) {
            // gagal update data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // Berhasil update data, return status 200
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi delete data potensigambar sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_gambar
        $id = $request->id_gambar;
        try {
            // delete data pada database dari model Potensidesagambar
            $result = Potensidesagambar::destroy($id);
        } catch (\Throwable $th) {
            // Gagal delete data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // Berhasil delete data, return status 200
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
            'id_potensidesa' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);
    }

    /**
     * Fungsi input gambar dan validasi gambar
     * @param obyek Request $request berisi data formulir
     * @return nama gambar
     */
    public function inputGambar(Request $request) {
        // mendapatkan ekstensi gambar
        $extension = $request->file('gambar')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber),0,6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'obyek-'.$randomName.'.'.$extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambar')->storeAs('public/potensigambar_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}