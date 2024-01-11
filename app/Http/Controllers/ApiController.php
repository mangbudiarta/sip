<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getDataRatings()
    {
        $ratings = DB::table('tb_reviewpotensi')
        ->join('tb_potensidesa', 'tb_reviewpotensi.id_potensidesa', '=', 'tb_potensidesa.id_potensidesa') // Adjust the join condition based on your actual foreign key relationship
        ->select('tb_potensidesa.namapotensi', 'tb_reviewpotensi.id_potensidesa',
            DB::raw('COUNT(CASE WHEN tb_reviewpotensi.rating = 5 THEN 1 ELSE NULL END) AS rating_5'),
            DB::raw('COUNT(CASE WHEN tb_reviewpotensi.rating = 4 THEN 1 ELSE NULL END) AS rating_4'),
            DB::raw('COUNT(CASE WHEN tb_reviewpotensi.rating = 3 THEN 1 ELSE NULL END) AS rating_3'),
            DB::raw('COUNT(CASE WHEN tb_reviewpotensi.rating = 2 THEN 1 ELSE NULL END) AS rating_2'),
            DB::raw('COUNT(CASE WHEN tb_reviewpotensi.rating = 1 THEN 1 ELSE NULL END) AS rating_1'))
        ->groupBy('tb_potensidesa.namapotensi', 'tb_reviewpotensi.id_potensidesa')
        ->get();
    
        return response()->json($ratings);
    }
}