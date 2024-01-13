<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentationController extends Controller
{

    public function index()
    {
        $petugas = Auth::guard('petugas')->user();
        $data['title'] = "Dokumentasi";
        return view('admin.documentation', $data, compact('petugas'));
    }
}
