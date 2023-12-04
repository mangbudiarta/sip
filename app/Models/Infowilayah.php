<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infowilayah extends Model
{
    use HasFactory;
    protected $table = 'tb_infowilayah';
    protected $primaryKey = 'id_infowilayah';
    // tidak perlu diinput manual
    protected $guarded = ['id_infowilayah'];
}
