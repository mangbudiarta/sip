<?php

namespace App\Http\Controllers;

use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class petugasController extends Controller
{
    /**
     * Fungsi menampilkan view index pada folder admin/petugas
     * @param -
     * @return view index dengan array key:kategori dan key:title
     */
    public function index()
    {
        return view('admin.petugas.index', [
            // mengisi array key: title dengan string 'petugas'
            'title' => 'petugas',
            'jeniskelamin' => Petugas::select('jeniskelamin')->distinct()->get()

        ]);
    }

    /**
     * Fungsi mendapatkan semua data petugas
     * @param -
     * @return view datapetugas dengan array key:petugas
     */
    public function fetch()
    {
        return view('admin.petugas.datapetugas', [
            // mengisi array key:petugas dengan semua data dari model petugas
            'petugas' => Petugas::all()
        ]);
    }

    /**
     * Fungsi menyimpan data petugas ke database
     * @param obyek Request dengan $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function store(Request $request)
    {
        // mengisi array validateData dengan data valid dari fungsi validasiRules (parameter data formulir)
        $validateData = $this->validasiRules($request);

        // Hash password menggunakan bcrypt
        $hashedPassword = Hash::make($validateData['password']);

        // Masukkan nama password yang telah di-hash ke dalam array validateData
        $validateData['password'] = $hashedPassword;

        if ($request->file('foto')) {
            // ada input foto, masukan nama foto dari fungsi inputfoto (parameter data formulir)
            $fileNameToStore = $this->inputfoto($request);
        } else {
            // tidak input foto, masukan nama noimage.png ke database
            $fileNameToStore = 'noimage.png';
        }
        // mengisi array validateData indeks foto dengan nama foto
        $validateData['foto'] = $fileNameToStore;

        try {
            // input data ke database dari model petugas
            $result = Petugas::create($validateData);
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
     * Fungsi menampilkan data petugas sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key: petugas dan key:kategori
     */
    public function show(Request $request)
    {
        // mengisi $id dari data form dengan name:id_petugas
        $id = $request->id_petugas;
        // mengisi $data dengan data petugas sesuai id dari model petugas
        $data = Petugas::find($id);
        return response()->json([
            // mengisi array key:petugas dengan $data
            'petugas' => $data
        ]);
    }

    /**
     * Fungsi menampilkan data petugas sesuai id untuk form edit
     * @param obyek Request $request berisi data formulir
     * @return response json dengan isi data petugas sesuai id
     */
    public function edit(Request $request)
    {
        // mengisi $id dari data form dengan name:id_petugas
        $id = $request->id_petugas;
        // mengisi $data dengan data petugas sesuai id dari model petugas
        $data = Petugas::find($id);
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
        // mengiai $petugas dengan dari model petugas sesuai id
        $petugas = Petugas::find($request->id_petugas);
        if ($request->file('foto')) {
            // ada input foto, masukan nama foto dari fungsi inputfoto (parameter data formulir)
            $fileNameToStore = $this->inputfoto($request);
        } else {
            // tidak input foto, pakai nama foto sebelumnya
            $fileNameToStore = $petugas->foto;
        }
        // mengisi array validateData indeks foto dengan nama foto
        $validateData['foto'] = $fileNameToStore;

        try {
            // update data ke database dari model petugas
            $result = Petugas::where('id_petugas', $petugas->id_petugas)->update($validateData);
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
     * Fungsi delete data petugas sesuai id
     * @param obyek Request $request berisi data formulir
     * @return response json dengan array key:status
     */
    public function destroy(Request $request)
    {
        // mengisi $id dari data form dengan name:id_petugas
        $id = $request->id_petugas;
        try {
            // delete data pada database dari model petugas
            $result = Petugas::destroy($id);
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
            'kode_petugas' => 'required|string|max:5',
            'nama' => 'required|string|max:255',
            'jeniskelamin' => 'required|in:Laki-laki,Perempuan',
            'tempatlahir' => 'required|string|max:255',
            'tanggallahir' => 'required|date',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:5',
            'telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'foto' => 'image|file|max:1024|nullable'
        ]);
    }

    /**
     * Fungsi input foto dan validasi foto
     * @param obyek Request $request berisi data formulir
     * @return nama foto
     */
    public function inputfoto(Request $request)
    {
        // mendapatkan ekstensi foto
        $extension = $request->file('foto')->getClientOriginalExtension();
        // mendapatkan 6 karakter ramdom dari $sumber
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber), 0, 6);
        // Nama foto untuk disimpan
        $fileNameToStore = 'fasilitas-' . $randomName . '.' . $extension;
        // Lokasi penyimpanan foto
        $path = $request->file('foto')->storeAs('public/petugas_img', $fileNameToStore);
        // return nama foto
        return $fileNameToStore;
    }
}
