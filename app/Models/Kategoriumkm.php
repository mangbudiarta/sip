<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriumkm extends Model
{
    use HasFactory;
    protected $table = 'tb_kategoriumkm';
    protected $primaryKey = 'id_kategori';
    // tidak perlu diinput manual
    protected $guarded = ['id_kategori'];

    // relasi 1 to N umkm
    public function umkm()
    {
        return $this->hasMany(Umkm::class, 'id_kategori','id_kategori');
    }
}