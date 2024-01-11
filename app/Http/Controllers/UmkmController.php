<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Umkmgambar;
use App\Models\Kategoriumkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/umkm
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        $petugas = Auth::guard('petugas')->user();
        return view('admin.umkm.index', [
            // mengisi array key:kategori dengan semua data dari model Kategoriumkm
            'kategori' => Kategoriumkm::all(),
            // mengisi array key: title dengan string 'Umkm'
            'title' => 'Umkm'
        ], compact('petugas'));
    }

    /**
     * Fungsi mendapatkan semua data umkm
     * @param -
     * @return view dataumkm dengan array key:umkm
     */
    public function fetch()
    {
        return view('admin.umkm.dataumkm', [
            // mengisi array key:umkm dengan semua data dari model Umkm
            'umkm' => Umkm::select('id_umkm', 'namaumkm', 'gambarcover', 'slug')->get()
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
            // input data ke database dari model Umkm
            $result = Umkm::create($validateData);
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
     * Fungsi menampilkan data umkm sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: umkm dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_umkm
        $id = $request->id_umkm;
        // mengisi $data dengan data umkm sesuai id dari model Umkm
        $data = Umkm::find($id);
        return response()->json([
            // mengisi array key:umkm dengan $data
            'umkm' => $data,
            // mengisi array key:kategori dengan nama kategori dari relasi kategoriumkm
            'kategori' => $data->kategoriumkm->namakategori,
        ]);
    }

    /**
     * Fungsi menampilkan data umkm sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data umkm sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_umkm
        $id = $request->id_umkm;
        // mengisi $data dengan data umkm sesuai id dari model Umkm
        $data = Umkm::find($id);
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
        $umkm = Umkm::find($request->id_umkm);
        if ($request->file('gambarcover')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $umkm->gambarcover;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambarcover'] = $fileNameToStore;

        try {
            // update data ke database dari model Umkm
            $result = Umkm::where('id_umkm', $umkm->id_umkm)->update($validateData);
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
        $id = $request->id_umkm;
        try {
            // delete data pada database dari model Umkm
            $result = Umkm::destroy($id);
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
            'namaumkm' => 'required|max:150',
            'deskripsi' => 'required',
            'slug' => 'required|max:50',
            'infopemilik' => 'required|max:50',
            'id_kategori' => 'required',
            'gambarcover' => 'image|file|max:1024|nullable'
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
        $fileNameToStore = 'umkm-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambarcover')->storeAs('public/umkm_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }    //

    /**
     * Fungsi menampilkan isi umkm
     * @param $slug dari tombol baca
     * @return view umkmdetail dengan data
     */
    public function detailumkm($slug)
    {
        $umkm = Umkm::where('slug', $slug)->firstOrFail();
        $gambar = Umkmgambar::select('gambar')->where('id_umkm', $umkm->id_umkm)->get();
        return view('frontend/umkm/umkmdetail', [
            "title" => $umkm->judulumkm,
            "umkmdetail" => $umkm,
            "gambarumkm" => $gambar
        ]);
    }
}
