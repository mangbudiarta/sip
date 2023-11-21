<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kategorifasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all kategorifasilitas
        return view('admin.fasilitas.index', [
            'kategori' => Kategorifasilitas::all(),
            'title' => 'Fasilitas'
        ]);
    }

    public function fetch()
    {
        // Get all fasilitas
        return view('admin.fasilitas.datafasilitas', [
            'fasilitas' => Fasilitas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $this->validasiRules($request);
        if ($request->file('gambar')) {
            // Insert image if any
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // Else add a dummy image
            $fileNameToStore = 'noimage.png';
        }
        $validateData['gambar']=$fileNameToStore;
        
        try {
            $result = Fasilitas::create($validateData);
        } catch (\Throwable $th) {
            // Failed insert
            return response()->json([
                'status' => 500
            ]);
        }

        // Success insert
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id_fasilitas;
        // Show fasilitas by id
		$data = Fasilitas::find($id);
		return response()->json([
            'fasilitas' => $data,
            'kategori' =>$data->kategorifasilitas->namakategori,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id_fasilitas;
		$data = Fasilitas::find($id);
		return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validateData = $this->validasiRules($request);
        $fasilitas = Fasilitas::find($request->id_fasilitas);
        if ($request->file('gambar')) {
            // Insert image if new image
            $fileNameToStore= $this->inputGambar($request);
        } else {
            // Else use old image
            $fileNameToStore = $fasilitas->gambar;
        }
        $validateData['gambar']=$fileNameToStore;
    
        try {
            $result = Fasilitas::where('id_fasilitas',$fasilitas->id_fasilitas)->update($validateData);
        } catch (\Throwable $th) {
            // Failed update
            return response()->json([
                'status' => 500,
            ]);
        }

        // Success update
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id_fasilitas;
        try {
            $result = Fasilitas::destroy($id);
        } catch (\Throwable $th) {
            // Failed delete
            return response()->json([
                'status' => 500,
            ]);
        }

        // Success Delete
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // Function cek rules
    public function validasiRules(Request $request) {
        return $request->validate([
            'namafasilitas' => 'required|max:100',
            'deskripsi' => 'max:255|nullable',
            'lokasi' => 'max:50|nullable',
            'kontak' => 'max:50|nullable',
            'id_kategori' => 'required',
            'gambar' => 'image|file|max:1024|nullable'
        ]);
    }

    // Function input gambar
    public function inputGambar(Request $request) {
        // Get just extension
        $extension = $request->file('gambar')->getClientOriginalExtension();
        // Get 6 charackter random name 
        $sumber = "ABCDEFGHIJKLMNPQRSTUVWXYZ";
        $randomName = substr(str_shuffle($sumber),0,6);
        // Filename to store
        $fileNameToStore = 'fasilitas-'.$randomName.'.'.$extension;
        // Path upload image
        $path = $request->file('gambar')->storeAs('public/fasilitas_img', $fileNameToStore);
        return $fileNameToStore;
    }
}