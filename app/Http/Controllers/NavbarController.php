<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
     /**
     * Fungsi menampilkan view index pada folder admin/navbar
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.navbar.index', [
            // mengisi array key: title dengan string 'Navbar'
            'title' => 'Navbar'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data navbar
     * @param -
     * @return view datanavbar dengan array key:navbar
     */
    public function fetch()
    {
        return view('admin.navbar.datanavbar', [
            // mengisi array key:navbar dengan semua data dari model Navbar
            'navbar' => Navbar::all()
        ]);
    }

    /**
     * Fungsi menyimpan data navbar ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        if ($request->file('gambarnav')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambarnav']=$fileNameToStore;
        
        try {
            // input data ke database dari model Navbar
            $result = Navbar::create($validateData);
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
     * Fungsi menampilkan data navbar sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data navbar sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_navbar
        $id = $request->id_navbar;
        // mengisi $data dengan data navbar sesuai id dari model Navbar
		$data = Navbar::find($id);
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
        // mengiai $navbar dengan dari model Navbar sesuai id
        $navbar = Navbar::find($request->id_navbar);
        if ($request->file('gambarnav')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $navbar->gambarnav;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambarnav']=$fileNameToStore;
    
        try {
            // update data ke database dari model Navbar
            $result = Navbar::where('id_navbar',$navbar->id_navbar)->update($validateData);
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
     * Fungsi delete data navbar sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_navbar
        $id = $request->id_navbar;
        try {
            // delete data pada database dari model Navbar
            $result = Navbar::destroy($id);
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
            'gambarnav' => 'image|file|max:1024|nullable'
        ]);
    }

    /**
     * Fungsi input gambar dan validasi gambar
     * @param obyek Request $request berisi data formulir
     * @return nama gambar
     */
    public function inputGambar(Request $request) {
        // mendapatkan ekstensi gambar
        $extension = $request->file('gambarnav')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber),0,6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'navbar-'.$randomName.'.'.$extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambarnav')->storeAs('public/navbar_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}
