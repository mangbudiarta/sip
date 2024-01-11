<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('petugas')->user()) {
            return redirect('/admin/loginpetugas')->withErrors('Silahkan Login Terlebih Dahulu !!');
        } else {
            return $next($request);
        }
    }
}
