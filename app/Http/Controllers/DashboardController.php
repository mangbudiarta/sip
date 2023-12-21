<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            // mengisi array key: title dengan string 'footer'
            'title' => 'dashboard'
        ]);
    }
}
