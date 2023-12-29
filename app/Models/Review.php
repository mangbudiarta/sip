<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'tb_reviewpotensi';
    protected $primaryKey = 'id_review';
    // tidak perlu diinput manual
    protected $guarded = ['id_review'];

    // relasi N to 1 wisatawan
    public function wisatawan()
    {
        return $this->belongsTo(Wisatawan::class, 'id_wisatawan','id_wisatawan');
    }
}