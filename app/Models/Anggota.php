<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'fakultas',
        'jurusan',
        'no_hp',
        'ttl',
        'angkatan',
        'dpk_asal',
        'alamat',
        'foto',
        'status',
    ];
}