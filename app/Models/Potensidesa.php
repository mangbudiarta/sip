<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potensidesa extends Model
{
    use HasFactory;
    protected $table = 'tb_potensidesa';
    protected $primaryKey = 'id_potensidesa';
    // tidak perlu diinput manual
    protected $guarded = ['id_potensidesa'];
    
    // relasi N to 1 kategoripotensi
    public function kategoripotensi()
    {
        return $this->belongsTo(Kategoripotensi::class, 'id_kategori','id_kategori');
    }
    
    // relasi 1 to N potensidesagambar
    public function potensidesagambar()
    {
        return $this->hasMany(Potensidesagambar::class, 'id_potensidesa','id_potensidesa');
    } 

    // relasi N to M wisatawan
    public function wisatawan()
    {
        return $this->belongsToMany(Wisatawan::class, 'tb_reviewpotensi','id_potensidesa','google_id');
    } 
    
}