<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'tb_berita';
    protected $primaryKey = 'id_berita';
    // tidak perlu diinput manual
    protected $guarded = ['id_berita'];

    // relasi N to 1 kategoriberita
    public function kategoriberita()
    {
        return $this->belongsTo(Kategoriberita::class, 'id_kategori','id_kategori');
    }
}