<?php

namespace App\Http\Controllers;

use App\Models\Infowilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfowilayahController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/infowilayah
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        $petugas = Auth::guard('petugas')->user();
        return view('admin.infowilayah.index', [
            // mengisi array key: title dengan string 'Info Wilayah'
            'title' => 'Infowilayah'
        ], compact('petugas'));
    }

    /**
     * Fungsi mendapatkan semua Info wailayah
     * @param -
     * @return view datainfowilayah dengan array key:infowilayah
     */
    public function fetch()
    {
        return view('admin.infowilayah.datainfowilayah', [
            // mengisi array key:infowilayah dengan semua data dari model infowilayah
            'infowilayah' => Infowilayah::all()
        ]);
    }

    /**
     * Fungsi menyimpan data infowilayah ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        if ($request->file('gambarcover')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambarcover'] = $fileNameToStore;

        try {
            // input data ke database dari model infowilayah
            $result = Infowilayah::create($validateData);
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
     * Fungsi menampilkan data infowilayah sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: infowilayah dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_infowilayah
        $id = $request->id_infowilayah;
        // mengisi $data dengan data infowilayah sesuai id dari model infowilayah
        $data = Infowilayah::find($id);
        return response()->json([
            // mengisi array key:infowilayah dengan $data
            'infowilayah' => $data
        ]);
    }

    /**
     * Fungsi menampilkan data infowilayah sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data infowilayah sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_infowilayah
        $id = $request->id_infowilayah;
        // mengisi $data dengan data infowilayah sesuai id dari model infowilayah
        $data = Infowilayah::find($id);
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
        // mengiai $infowilayah dengan dari model infowilayah sesuai id
        $infowilayah = Infowilayah::find($request->id_infowilayah);
        if ($request->file('gambarcover')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $infowilayah->gambarcover;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambarcover'] = $fileNameToStore;

        try {
            // update data ke database dari model infowilayah
            $result = infowilayah::where('id_infowilayah', $infowilayah->id_infowilayah)->update($validateData);
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
     * Fungsi delete data infowilayah sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_infowilayah
        $id = $request->id_infowilayah;
        try {
            // delete data pada database dari model infowilayah
            $result = Infowilayah::destroy($id);
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
            'judul' => 'required|max:25',
            'deskripsi' => 'max:255|required',
            'gambarcover' => 'image|file|max:1024'
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
        $extension = $request->file('gambarcover')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber), 0, 6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'infowilayah-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambarcover')->storeAs('public/infowilayah_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}
