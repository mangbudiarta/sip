<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooterController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/footer
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        $petugas = Auth::guard('petugas')->user();
        return view('admin.footer.index', [
            // mengisi array key: title dengan string 'footer'
            'title' => 'footer'
        ], compact('petugas'));
    }

    /**
     * Fungsi mendapatkan semua data footer
     * @param -
     * @return view datafooter dengan array key:footer
     */
    public function fetch()
    {
        return view('admin.footer.datafooter', [
            // mengisi array key:footer dengan semua data dari model footer
            'footer' => Footer::all()
        ]);
    }

    /**
     * Fungsi menyimpan data footer ke database
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
            // input data ke database dari model footer
            $result = Footer::create($validateData);
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
     * Fungsi menampilkan data footer sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: footer dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_footer
        $id = $request->id_footer;
        // mengisi $data dengan data footer sesuai id dari model footer
        $data = Footer::find($id);
        return response()->json([
            // mengisi array key:footer dengan $data
            'footer' => $data
        ]);
    }

    /**
     * Fungsi menampilkan data footer sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data footer sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_footer
        $id = $request->id_footer;
        // mengisi $data dengan data footer sesuai id dari model footer
        $data = Footer::find($id);
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
        // mengiai $footer dengan dari model footer sesuai id
        $footer = Footer::find($request->id_footer);
        if ($request->file('gambar')) {
            // ada input gambar, masukan nama gambar dari fungsi inputGambar (parameter data formulir)
            $fileNameToStore = $this->inputGambar($request);
        } else {
            // tidak input gambar, pakai nama gambar sebelumnya
            $fileNameToStore = $footer->gambar;
        }
        // mengisi array validateData indeks gambar dengan nama gambar
        $validateData['gambar'] = $fileNameToStore;

        try {
            // update data ke database dari model footer
            $result = Footer::where('id_footer', $footer->id_footer)->update($validateData);
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
     * Fungsi delete data footer sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_footer
        $id = $request->id_footer;
        try {
            // delete data pada database dari model footer
            $result = Footer::destroy($id);
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
            'peta' => 'required',
            'deskripsi' => 'required',
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
        $fileNameToStore = 'fasilitas-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan gambar
        $path = $request->file('gambar')->storeAs('public/footer_img', $fileNameToStore);
        // return nama gambar
        return $fileNameToStore;
    }
}
