<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;
    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_petugas';
    protected $fillable  = ['kode_petugas', 'nama', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'email', 'password', 'telepon', 'alamat', 'foto'];
}
