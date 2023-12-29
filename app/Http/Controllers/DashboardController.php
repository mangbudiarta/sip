<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $petugas = Auth::guard('petugas')->user();
        $data['title'] = 'Dashboard';
        return view('admin.dashboard', compact('petugas'), $data);
    }
}
