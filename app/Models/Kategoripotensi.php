<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoripotensi extends Model
{
    use HasFactory;
    protected $table = 'tb_kategoripotensi';
    protected $primaryKey = 'id_kategori';
    // tidak perlu diinput manual
    protected $guarded = ['id_kategori'];

    // relasi 1 to N potensidesa
    public function potensidesa()
    {
        return $this->hasMany(Potensidesa::class, 'id_kategori','id_kategori');
    }
}