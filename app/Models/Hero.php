<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $table = "hero";
    public $timestamps = false;
    protected $fillable = [
        'judul1',
        'judul2',
        'judul3',
        'url_image',
        'aktif',
    ];
}
