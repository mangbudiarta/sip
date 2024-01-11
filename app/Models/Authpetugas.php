<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Authpetugas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_petugas';

    protected $fillable = [
        'nama', 'email', 'password', 'foto',
    ];
}
