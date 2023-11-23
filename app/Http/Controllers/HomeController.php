<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kategorifasilitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$data = [];  // empty array
        //$data['fasilitas'] = Fasilitas::all();   //data from fasilitas table
        //return view('frontend.home',compact('data'));
    }
    
    public function fasilitas(Request $request)
    {
        $keyword = $request->input('keyword');
        $kategori = $request->input('id_kategori');

        $query = Fasilitas::query();

        if ($keyword) {
            $query->where('namafasilitas', 'like', '%' . $keyword . '%');
        }

        if ($kategori) {
            $query->where('id_kategori', $kategori);
        }

        $results = $query->orderBy('created_at','desc')->get();
        return view('frontend.pages.fasilitas', [
            'fasilitas' => $results->isEmpty() ? [] : $results,
            'kategori' => Kategorifasilitas::all(),
            'title' => 'Fasilitas',
            'message' => $results->isEmpty() ? 'Data tidak ditemukan' : null,
        ]);

    }
}