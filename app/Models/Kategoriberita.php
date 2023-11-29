<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriberita extends Model
{
    use HasFactory;
    protected $table = 'tb_kategoriberita';
    protected $primaryKey = 'id_kategori';
    // tidak perlu diinput manual
    protected $guarded = ['id_kategori'];
    
    // relasi 1 to N berita
    public function berita()
    {
        return $this->hasMany(Berita::class, 'id_kategori','id_kategori');
    }
}