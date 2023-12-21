<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loginpetugas extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tb_petugas';
    protected $primaryKey = 'kode_petugas';

    protected $fillable = [
        'nama', 'jeniskelamin', 'tempatlahir', 'tanggallahir', 'email', 'password', 'telepon', 'alamat', 'foto',
    ];
}