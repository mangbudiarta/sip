<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensidesagambar extends Model
{
    use HasFactory;
    protected $table = 'tb_potensidesagambar';
    protected $primaryKey = 'id_gambar';
    
    // relasi N to 1 potensidesa
    public function potensidesa()
    {
        return $this->belongsTo(Potensidesa::class, 'id_potensidesa','id_potensidesa');
    }
}