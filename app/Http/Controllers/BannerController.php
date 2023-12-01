<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/banner
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.banner.index', [
            // mengisi array key: title dengan string 'banner'
            'title' => 'banner'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data banner
     * @param -
     * @return view databanner dengan array key:banner
     */
    public function fetch()
    {
        return view('admin.banner.databanner', [
            // mengisi array key:banner dengan semua data dari model banner
            'banner' => Banner::all()
        ]);
    }

    /**
     * Fungsi menyimpan data banner ke database
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
            // input data ke database dari model banner
            $result = Banner::create($validateData);
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
     * Fungsi menampilkan data banner sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: banner dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_banner
        $id = $request->id_banner;
        // mengisi $data dengan data banner sesuai id dari model banner
		$data = Banner::find($id);
		return response()->json([
            // mengisi array key:banner dengan $data
            'banner' => $data
        ]);
    }

    /**
     * Fungsi menampilkan data banner sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data banner sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_banner
        $id = $request->id_banner;
        // mengisi $data dengan data banner sesuai id dari model banner
		$data = Banner::find($id);
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
        // mengiai $banner dengan dari model banner sesuai id
        $banner = Banner::find($request->id_banner);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $banner->gambar;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar']=$fileNameToStore;
    
        try {
            // update data ke database dari model banner
            $result = Banner::where('id_banner',$banner->id_banner)->update($validateData);
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
     * Fungsi delete data banner sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_banner
        $id = $request->id_banner;
        try {
            // delete data pada database dari model banner
            $result = Banner::destroy($id);
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
            'judul' => 'required|max:50',
            'deskripsi' => 'required',
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
        $path = $request->file('gambar')->storeAs('public/banner_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}
