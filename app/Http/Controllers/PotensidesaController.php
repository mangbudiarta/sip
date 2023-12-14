<?php

namespace App\Http\Controllers;

use App\Models\Kategoripotensi;
use App\Models\Potensidesa;
use App\Models\Potensidesagambar;
use Illuminate\Http\Request;

class PotensidesaController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/potensidesa
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.potensidesa.index', [
            // mengisi array key:kategori dengan semua data dari model KategoriPotensi
            'kategori' => Kategoripotensi::all(),
            // mengisi array key: title dengan string 'Potensi Desa'
            'title' => 'Potensi Desa'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data potensidesa
     * @param -
     * @return view datapotensidesa dengan array key:potensidesa
     */
    public function fetch()
    {
        return view('admin.potensidesa.datapotensi', [
            // mengisi array key:potensidesa dengan semua data dari model potensidesa
            'potensidesa' => Potensidesa::select('id_potensidesa', 'namapotensi', 'gambarcover','slug')->get()
        ]);
    }

    /**
     * Fungsi menyimpan data potensidesa ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        if ($request->file('gambarcover')) {
            // ada input gambarcover, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks gambarcover dengan nama gambar
        $validateData['gambarcover']=$fileNameToStore;
        
        try {
            // input data ke database dari model potensidesa
            $result = Potensidesa::create($validateData);
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
     * Fungsi menampilkan data potensidesa sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: potensidesa dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_potensidesa
        $id = $request->id_potensidesa;
        // mengisi $data dengan data potensidesa sesuai id dari model potensidesa
		$data = Potensidesa::find($id);
		return response()->json([
            // mengisi array key:potensidesa dengan $data
            'potensidesa' => $data,
            // mengisi array key:kategori dengan nama kategori dari relasi kategoripotensi
            'kategori' =>$data->kategoripotensi->namakategori,
        ]);
    }

    /**
     * Fungsi menampilkan data potensidesa sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data potensidesa sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_potensidesa
        $id = $request->id_potensidesa;
        // mengisi $data dengan data potensidesa sesuai id dari model potensidesa
		$data = Potensidesa::find($id);
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
        // mengiai $potensidesa dengan dari model potensidesa sesuai id
        $potensidesa = Potensidesa::find($request->id_potensidesa);
        if ($request->file('gambarcover')) {
            // ada input gambar, masukan nama gambarcover dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $potensidesa->gambarcover;
        }
        // mengisi array validateData indeks gambarcover dengan nama gambar
        $validateData['gambarcover']=$fileNameToStore;
    
        try {
            // update data ke database dari model potensidesa
            $result = Potensidesa::where('id_potensidesa',$potensidesa->id_potensidesa)->update($validateData);
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
     * Fungsi delete data potensidesa sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_potensidesa
        $id = $request->id_potensidesa;
        try {
            // delete data pada database dari model potensidesa
            $result = Potensidesa::destroy($id);
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
            'namapotensi' => 'required|max:150',
            'lokasi' => 'required|max:50',
            'namapotensi' => 'required|max:150',
            'tanggalposting' => 'required',
            'penulis' => 'required|max:10',
            'deskripsi' => 'required',
            'slug' => 'required|max:50',
            'id_kategori' => 'required',
            'gambarcover' => 'image|file|max:1024|nullable'
        ]);
    }

    /**
     * Fungsi input gambar dan validasi gambar
     * @param obyek Request $request berisi data formulir
     * @return nama gambar
     */
    public function inputGambar(Request $request) {
        // mendapatkan ekstensi gambar
        $extension = $request->file('gambarcover')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber),0,6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'potensi-'.$randomName.'.'.$extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambarcover')->storeAs('public/potensi_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }

    /**
     * Fungsi menampilkan isi potensi desa
     * @param $slug dari tombol baca
     * @return view potensidetail dengan data
     */
    public function detailpotensi($slug) {
        $potensi = Potensidesa::where('slug', $slug)->firstOrFail();
        $gambar = Potensidesagambar::select('gambar')->where('id_potensidesa', $potensi->id_potensidesa)->get();
        return view('frontend/potensi/potensidetail',[
            "title" =>$potensi->namapotensi,
            "potensidetail"=>$potensi,
            "gambarpotensi"=>$gambar
        ]);
        
    }
}