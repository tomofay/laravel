<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = DB::table('service_schedules')->get();
        return view('schedules.index', [
            'title' => 'Schedules',
            'schedules' => $schedules
        ]);
    }

    public function create()
    {
        $services = DB::table('services')->get();
        $doctors = DB::table('doctors')->get();
        return view('schedules.form', [
            'title' => 'Schedules',
            'services' => $services,
            'doctors' => $doctors
        ]);
    }

    public function store(Request $request)
    {
      $request->validate([
        'id_layanan'    => 'required|exists:services,id',
        'id_dokter'     => 'required|exists:doctors,id',
        'nama_layanan'  => 'required|string|max:255',
        'foto1'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto2'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto3'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto4'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'foto5'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'biaya_layanan' => 'required|numeric|min:0',
    ]);
        $data = [
            'id_layanan' => $request->id_layanan,
            'id_dokter' => $request->id_dokter,
            'nama_layanan' => $request->nama_layanan,
            'biaya_layanan' => $request->biaya_layanan,
        ];

        for ($i=1; $i<=5; $i++) {
            $foto = 'foto'.$i;
            if ($request->hasFile($foto)) {
                $data[$foto] = $request->file($foto)->store('schedules', 'public');
            } else {
                $data[$foto] = null;
            }
        }

        DB::table('service_schedules')->insert($data);

        return redirect()->route('schedules.index')->with('success', 'Schedule berhasil ditambahkan!');
    }
}