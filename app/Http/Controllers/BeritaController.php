<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategoriberita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/berita
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.berita.index', [
            // mengisi array key:kategori dengan semua data dari model Kategoriberita
            'kategori' => Kategoriberita::all(),
            // mengisi array key: title dengan string 'berita'
            'title' => 'Berita'
        ]);
    }

    /**
     * Fungsi mendapatkan semua data berita
     * @param -
     * @return view databerita dengan array key:berita
     */
    public function fetch()
    {
        return view('admin.berita.databerita', [
            // mengisi array key:berita dengan semua data dari model berita
            'berita' => Berita::select('id_berita', 'judulberita', 'penulis', 'tanggalposting', 'id_kategori', 'slug')->get()
        ]);
    }

    /**
     * Fungsi menyimpan data berita ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);
        if ($request->file('gambarcover')) {
            // ada input gambarcover, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks gambarcover dengan nama gambar
        $validateData['gambarcover'] = $fileNameToStore;

        try {
            // input data ke database dari model berita
            $result = Berita::create($validateData);
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
     * Fungsi menampilkan data berita sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: berita dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_berita
        $id = $request->id_berita;
        // mengisi $data dengan data berita sesuai id dari model berita
        $data = Berita::find($id);
        return response()->json([
            // mengisi array key:berita dengan $data
            'berita' => $data,
            // mengisi array key:kategori dengan nama kategori dari relasi kategoriberita
            'kategori' => $data->kategoriberita->namakategori,
        ]);
    }

    /**
     * Fungsi menampilkan data berita sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data berita sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_berita
        $id = $request->id_berita;
        // mengisi $data dengan data berita sesuai id dari model berita
        $data = Berita::find($id);
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
        // mengiai $berita dengan dari model berita sesuai id
        $berita = Berita::find($request->id_berita);
        if ($request->file('gambarcover')) {
            // ada input gambar, masukan nama gambarcover dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $berita->gambarcover;
        }
        // mengisi array validateData indeks gambarcover dengan nama gambar
        $validateData['gambarcover'] = $fileNameToStore;

        try {
            // update data ke database dari model berita
            $result = Berita::where('id_berita', $berita->id_berita)->update($validateData);
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
     * Fungsi delete data berita sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_berita
        $id = $request->id_berita;
        try {
            // delete data pada database dari model berita
            $result = Berita::destroy($id);
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
            'judulberita' => 'required|max:150',
            'tanggalposting' => 'required',
            'penulis' => 'required|max:10',
            'isiberita' => 'required',
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
    public function inputGambar(Request $request)
    {
        // mendapatkan ekstensi gambar
        $extension = $request->file('gambarcover')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber), 0, 6);
        // Nama gambar untuk disimpan
        $fileNameToStore = 'berita-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambarcover')->storeAs('public/berita_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }

    /**
     * Fungsi menampilkan isi berita
     * @param $slug dari tombol baca
     * @return view beritadetail dengan data
     */
    public function detailberita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('frontend/berita/beritadetail', [
            "title" => $berita->judulberita,
            "beritadetail" => $berita
        ]);
    }
}
