<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorifasilitas extends Model
{
    use HasFactory;
    protected $table = 'tb_kategorifasilitas';
    protected $primaryKey = 'id_kategori';
    protected $guarded = ['id_kategori'];
    
    // relasi 1 to N fasilitas
    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_kategori','id_kategori');
    }
}