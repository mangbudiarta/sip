<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Umkmgambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmGambarController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/umkm/umkmgambar
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index($id_umkm)
    {
        $petugas = Auth::guard('petugas')->user();
        return view('admin.umkm.umkmgambar', [
            // mengisi array key:kategori dengan semua data dari model Kategoriumkm
            'umkm' => Umkm::select('id_umkm', 'namaumkm')->where('id_umkm', $id_umkm)->first(),
            // mengisi array key: title dengan string 'Umkm'
            'title' => 'Umkm Gambar'
        ], compact('petugas'));
    }

    /**
     * Fungsi mendapatkan semua data umkm
     * @param -
     * @return view dataumkm dengan array key:umkm
     */
    public function fetch(Request $request)
    {
        return view('admin.umkm.datagambar', [
            // mengisi array key:umkm dengan semua data dari model Umkm
            'umkmgambar' => Umkmgambar::where('id_umkm', $request->id_umkm)->get(),
        ]);
    }

    /**
     * Fungsi menyimpan data umkm ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar'] = $fileNameToStore;

        try {
            // input data ke database dari model UmkmGambar
            $result = Umkmgambar::create($validateData);
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
     * Fungsi menampilkan data umkm sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data umkm sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_gambar
        $id = $request->id_gambar;
        // mengisi $data dengan data umkm sesuai id dari model Umkm
        $data = Umkmgambar::find($id);
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
        // mengiai $umkm dengan dari model Umkm sesuai id
        $umkmgambar = Umkmgambar::find($request->id_gambar);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $umkmgambar->gambar;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar'] = $fileNameToStore;

        try {
            // update data ke database dari model Umkm
            $result = Umkmgambar::where('id_gambar', $umkmgambar->id_gambar)->update($validateData);
        } catch (\Throwable $th) {
            // gagal update data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // Berhasil update data, return status 200
        if ($result) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi delete data umkm sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_umkm
        $id = $request->id_gambar;
        try {
            // delete data pada database dari model Umkm
            $result = Umkmgambar::destroy($id);
        } catch (\Throwable $th) {
            // Gagal delete data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // Berhasil delete data, return status 200
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
            'id_umkm' => 'required',
            'gambar' => 'image|file|max:1024|nullable'
        ]);
    }

    /**
     * Fungsi input gambar dan validasi gambar
     * @param obyek Request $request berisi data formulir
     * @return nama gambar
     */
    public function inputGambar(Request $request)
    {
        // mendapatkan ekstensi gambar
        $extension = $request->file('gambar')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber), 0, 6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'umkm-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambar')->storeAs('public/umkmgambar_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }    //

}
