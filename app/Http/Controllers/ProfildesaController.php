<?php

namespace App\Http\Controllers;

use App\Models\Profildesa;
use Illuminate\Http\Request;

class ProfildesaController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/profildesa
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.profildesa.index', [
            // mengisi array key: title dengan string 'profildesa'
            'title' => 'profildesa'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data profildesa
     * @param -
     * @return view dataprofildesa dengan array key:profildesa
     */
    public function fetch()
    {
        return view('admin.profildesa.dataprofildesa', [
            // mengisi array key:profildesa dengan semua data dari model profildesa
            'profildesa' => Profildesa::select('id_profildesa', 'judul', 'gambarcover')->get()
        ]);
    }

    /**
     * Fungsi menyimpan data profildesa ke database
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
            // input data ke database dari model profildesa
            $result = Profildesa::create($validateData);
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
     * Fungsi menampilkan data profildesa sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: profildesa dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_profildesa
        $id = $request->id_profildesa;
        // mengisi $data dengan data profildesa sesuai id dari model profildesa
        $data = Profildesa::find($id);
        return response()->json([
            // mengisi array key:profildesa dengan $data
            'profildesa' => $data,
        ]);
    }

    /**
     * Fungsi menampilkan data profildesa sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data profildesa sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_profildesa
        $id = $request->id_profildesa;
        // mengisi $data dengan data profildesa sesuai id dari model profildesa
        $data = Profildesa::find($id);
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
        $profildesa = Profildesa::find($request->id_profildesa);
        if ($request->file('gambarcover')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $profildesa->gambarcover;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambarcover']=$fileNameToStore;

        try {
            // update data ke database dari model profildesa
            $result = Profildesa::where('id_profildesa', $profildesa->id_profildesa)->update($validateData);
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
     * Fungsi delete data profildesa sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_profildesa
        $id = $request->id_profildesa;
        try {
            // delete data pada database dari model profildesa
            $result = Profildesa::destroy($id);
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
            'deskripsi' => 'required',
            'video' => 'max:60|required',
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
        $extension = $request->file('gambarcover')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber), 0, 6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'profildesa-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambarcover')->storeAs('public/profildesa_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}
