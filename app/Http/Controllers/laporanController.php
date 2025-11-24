<?php

namespace App\Http\Controllers;
use App\Models\Doctors;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    function lap_service_schedule_index(){
        return view('laporan.service-schedule',[
            'title' => 'service schedule report',
            'doctors' => doctors::all(),
        ]);
    }


    function lap_service_schedule($pilihan){

    }
        
}
