<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kategorifasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/fasilitas
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.fasilitas.index', [
            // mengisi array key:kategori dengan semua data dari model Kategorifasilitas
            'kategori' => Kategorifasilitas::all(),
            // mengisi array key: title dengan string 'Fasilitas'
            'title' => 'Fasilitas'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data fasilitas
     * @param -
     * @return view datafasilitas dengan array key:fasilitas
     */
    public function fetch()
    {
        return view('admin.fasilitas.datafasilitas', [
            // mengisi array key:fasilitas dengan semua data dari model Fasilitas
            'fasilitas' => Fasilitas::all()
        ]);
    }

    /**
     * Fungsi menyimpan data fasilitas ke database
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
            // input data ke database dari model Fasilitas
            $result = Fasilitas::create($validateData);
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
     * Fungsi menampilkan data fasilitas sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: fasilitas dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_fasilitas
        $id = $request->id_fasilitas;
        // mengisi $data dengan data fasilitas sesuai id dari model Fasilitas
		$data = Fasilitas::find($id);
		return response()->json([
            // mengisi array key:fasilitas dengan $data
            'fasilitas' => $data,
            // mengisi array key:kategori dengan nama kategori dari relasi kategorifasilitas
            'kategori' =>$data->kategorifasilitas->namakategori,
        ]);
    }

    /**
     * Fungsi menampilkan data fasilitas sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data fasilitas sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_fasilitas
        $id = $request->id_fasilitas;
        // mengisi $data dengan data fasilitas sesuai id dari model Fasilitas
		$data = Fasilitas::find($id);
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
        // mengiai $fasilitas dengan dari model Fasilitas sesuai id
        $fasilitas = Fasilitas::find($request->id_fasilitas);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $fasilitas->gambar;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar']=$fileNameToStore;
    
        try {
            // update data ke database dari model Fasilitas
            $result = Fasilitas::where('id_fasilitas',$fasilitas->id_fasilitas)->update($validateData);
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
     * Fungsi delete data fasilitas sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_fasilitas
        $id = $request->id_fasilitas;
        try {
            // delete data pada database dari model Fasilitas
            $result = Fasilitas::destroy($id);
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
            'namafasilitas' => 'required|max:100',
            'deskripsi' => 'max:255|nullable',
            'lokasi' => 'max:50|nullable',
            'kontak' => 'max:50|nullable',
            'id_kategori' => 'required',
            'gambar' => 'image|file|max:1024|nullable'
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
        $fileNameToStore = 'fasilitas-'.$randomName.'.'.$extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambar')->storeAs('public/fasilitas_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}