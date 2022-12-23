<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota_kelas extends Model
{
    use HasFactory;
    protected $table = "anggota_kelas";
    protected $fillable = [
        'users_id',
        'kelas_id'
    ];
}
