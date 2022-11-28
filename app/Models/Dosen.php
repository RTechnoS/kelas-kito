<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $fillable = [
        'users_id',
        'nama',
        'foto',
        'nidn',
        'hp',
        'pendidikan'
    ];
}
