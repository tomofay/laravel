<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceModel;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title' => 'Home',
            'hero' => DB::table('hero')->where('aktif', 1)->first(),
            'service_slider' => ServiceModel::all(),
        ]);
    }


    public function create()
    {
       //
    }
}

