<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    use HasFactory;
    protected $table = 'tb_wisatawan';
    protected $primaryKey = 'google_id';
    
    // relasi N to M potensidesa
    public function potensidesa()
    {
        return $this->belongsToMany(Potensidesa::class, 'tb_reviewpotensi','id_potensidesa','google_id');
    } 
}