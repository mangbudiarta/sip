<?php

namespace App\Http\Controllers;

use App\Models\Kategoriumkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriumkmController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder umkm/kategoriumkm
     * @param -
     * @return view index dengan array key:title
     */
    public function index()
    {
        $petugas = Auth::guard('petugas')->user();
        return view('admin.umkm.kategoriumkm', [
            // mengisi array key: title dengan string 'Kategori Umkm'
            'title' => "Kategori Umkm"
        ], compact('petugas'));
    }

    /**
     * Fungsi mendapatkan semua data kategori umkm
     * @param -
     * @return view datakategori dengan array key:kategoriumkm
     */
    public function fetch()
    {
        return view('admin.umkm.datakategori', [
            // mengisi array key:kategoriumkm dengan beberapa data dari model Kategoriumkm
            'kategoriumkm' => Kategoriumkm::select('id_kategori', 'namakategori')->get()
        ]);
    }

    /**
     * Fungsi menyimpan data kategoriumkm ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        try {
            // input data ke database dari model Kategoriumkm
            $result = Kategoriumkm::create($validateData);
        } catch (\Throwable $th) {
            // gagal input data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // berhasil input data, return status 200
        if ($result) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi menampilkan data kategoriumkm sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data kategoriumkm sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_kategori
        $id = $request->id_kategori;
        // mengisi $data dengan data kategoriumkm sesuai id dari model Kategoriumkm
        $data = Kategoriumkm::find($id);
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
        // mengiai $category dengan dari model Kategoriumkm sesuai id
        $category = Kategoriumkm::find($request->id_kategori);

        try {
            // update data ke database dari model Kategoriumkm
            $result = Kategoriumkm::where('id_kategori', $category->id_kategori)->update($validateData);
        } catch (\Throwable $th) {
            // gagal update data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // berhasil update data, return status 200
        if ($result) {
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Fungsi delete data kategoriumkm sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_kategori
        $id = $request->id_kategori;

        try {
            // delete data pada database dari model Kategoriumkm
            $result = Kategoriumkm::destroy($id);
        } catch (\Throwable $th) {
            // gagal delete data, return status 500
            return response()->json([
                'status' => 500,
            ]);
        }

        // berhasil delete data, return status 200
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
            'namakategori' => 'required|max:25'
        ]);
    }
}
