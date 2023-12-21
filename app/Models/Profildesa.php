<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profildesa extends Model
{
    use HasFactory;
    protected $table = 'tb_profildesa';
    protected $primaryKey = 'id_profildesa';
    // tidak perlu diinput manual
    protected $guarded = ['id_profildesa'];
}
