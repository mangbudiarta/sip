<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkmgambar extends Model
{
    use HasFactory;
    protected $table = 'tb_umkmgambar';
    protected $primaryKey = 'id_gambar';
    
    // relasi N to 1 umkm
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'id_umkm','id_umkm');
    }
}