<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailserviceschedule extends Model
{
    protected $table = "detail_service_schedule";
    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_layanan',
        'nama_hari',
        'waktu_mulai',
        'waktu_selesai',
        'created_at',
        'updated_at',
    ];
}