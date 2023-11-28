<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'tb_fasilitas';
    protected $primaryKey = 'id_fasilitas';
    // tidak perlu diinput manual
    protected $guarded = ['id_fasilitas'];

    // relasi N to 1 kategorifasilitas
    public function kategorifasilitas()
    {
        return $this->belongsTo(Kategorifasilitas::class, 'id_kategori','id_kategori');
    }
}