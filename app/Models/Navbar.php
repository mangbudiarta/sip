<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    use HasFactory;
    protected $table = 'tb_navbar';
    protected $primaryKey = 'id_navbar';
    // tidak perlu diinput manual
    protected $guarded = ['id_navbar'];
}
