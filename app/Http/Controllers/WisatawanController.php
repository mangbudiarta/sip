<?php

namespace App\Http\Controllers;

use App\Models\Wisatawan;
use Illuminate\Http\Request;

class WisatawanController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/wisatawan
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.wisatawan.index', [
            // mengisi array key: title dengan string 'wisatawan'
            'title' => 'wisatawan'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data wisatawan
     * @param -
     * @return view datawisatawan dengan array key:wisatawan
     */
    public function fetch()
    {
        return view('admin.wisatawan.datawisatawan', [
            // mengisi array key:wisatawan dengan semua data dari model wisatawan
            'wisatawan' => Wisatawan::all()
        ]);
    }

    /**
     * Fungsi menampilkan data wisatawan sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data wisatawan sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_wisatawan
        $id = $request->id_wisatawan;
        // mengisi $data dengan data wisatawan sesuai id dari model wisatawan
		$data = Wisatawan::find($id);
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
        // mengiai $wisatawan dengan dari model wisatawan sesuai id
        $wisatawan = Wisatawan::find($request->id_wisatawan);
        if ($request->file('foto')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $wisatawan->foto;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['foto']=$fileNameToStore;
    
        try {
            // update data ke database dari model wisatawan
            $result = Wisatawan::where('id_wisatawan',$wisatawan->id_wisatawan)->update($validateData);
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
     * Fungsi delete data wisatawan sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_wisatawan
        $id = $request->id_wisatawan;
        try {
            // delete data pada database dari model wisatawan
            $result = Wisatawan::destroy($id);
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
            'nama' => 'required|max:100',
            'email' => 'required',
            'foto' => 'image|file|max:1024|nullable'
        ]);
    }

    /**
     * Fungsi input foto dan validasi foto
     * @param obyek Request $request berisi data formulir
     * @return nama foto
     */
    public function inputGambar(Request $request) {
        // mendapatkan ekstensi foto
        $extension = $request->file('foto')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber),0,6);
        // Nama foto untuk disimpan
        $fileNameToStore = 'wisatawan-'.$randomName.'.'.$extension;
        // Lokasi penyimpanan foto
        $path = $request->file('foto')->storeAs('public/wisatawan_img', $fileNameToStore);
        // return nama foto
        return $fileNameToStore;
    }
}