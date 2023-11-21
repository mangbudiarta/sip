<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$data = [];  // empty array
        //$data['fasilitas'] = Fasilitas::all();   //data from fasilitas table
        //return view('frontend.home',compact('data'));
    }
    
    public function fasilitas()
    {
        return view('frontend.pages.fasilitas', [
            'fasilitas' => Fasilitas::orderBy('created_at','desc')->get(),
            'title' => 'Fasilitas'
        ]);
    }
}