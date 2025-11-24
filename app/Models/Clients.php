<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
   protected $table = "clients";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama_lengkap',
        'no_hp',
        'alamat',
        'jk',
        'tgl_lahir',
        'foto',
        'email',
        'password',
        'Status', // Aktif/Tidak Aktif
        'created_at',
        'updated_at',
    ];
}
