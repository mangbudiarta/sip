<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
    use HasFactory;
    protected $table = 'tb_wisatawan';
    protected $primaryKey = 'id_wisatawan';
    protected $fillable = [
        'id_wisatawan',
        'google_id',
        'nama',
        'email',
        'password',
        'foto'
    ];

    
    // relasi N to M potensidesa
    public function potensidesa()
    {
        return $this->belongsToMany(Potensidesa::class, 'tb_reviewpotensi','id_potensidesa','id_wisatawan');
    } 
}