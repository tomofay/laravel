<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    protected $table = "doctors";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama_dokter',
        'gelar_depan',
        'gelar_belakang',
        'spesialis',
        'jk',
        'alamat',
        'telepon',
        'agama',
        'foto',
        'status',
        'created_at',
        'updated_at',
    ];
}

