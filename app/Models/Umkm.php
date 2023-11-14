<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    protected $table = 'tb_umkm';
    protected $primaryKey = 'id_umkm';
    
    // relasi N to 1 kategoriumkm
    public function kategoriumkm()
    {
        return $this->belongsTo(Kategoriumkm::class, 'id_kategori','id_kategori');
    }
    
    // relasi 1 to N umkmgambar
    public function umkmgambar()
    {
        return $this->hasMany(Umkmgambar::class, 'id_umkm','id_umkm');
    } 
}