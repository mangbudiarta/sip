<?php

namespace App\Http\Controllers;

use App\Models\Kategorifasilitas;
use Illuminate\Http\Request;

class KategorifasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show view
        return view('admin.fasilitas.kategorifasilitas', [
            'title' => "Kategori Fasilitas"
        ]);
    }


    public function fetch()
    {
        // Get all kategorifasilitas
        return view('admin.fasilitas.datakategori', [
            'kategorifasilitas' => Kategorifasilitas::all()
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
        try {
            $result = Kategorifasilitas::create($validateData);
        } catch (\Throwable $th) {
            // Failed insert
            return response()->json([
                'status' => 500,
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id = $request->id_kategori;
		$data = Kategorifasilitas::find($id);
		return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validateData = $this->validasiRules($request);
        $category = Kategorifasilitas::find($request->id_kategori);

        try {
            $result = Kategorifasilitas::where('id_kategori', $category->id_kategori)->update($validateData);
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
        $id = $request->id_kategori;
        
        try {
            $result = Kategorifasilitas::destroy($id);
        } catch (\Throwable $th) {
            // Failed delete
            return response()->json([
                'status' => 500,
            ]);
        }
        
        // Success delete
        if($result){
            return response()->json([
                'status' => 200,
            ]);
        }
    }

    // Function cek rules
    public function validasiRules(Request $request) {
        return $request->validate([
            'namakategori' => 'required|max:25'
        ]);
    }
}