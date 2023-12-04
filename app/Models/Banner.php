<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'tb_banner';
    protected $primaryKey = 'id_banner';
    // tidak perlu diinput manual
    protected $guarded = ['id_banner'];
}
