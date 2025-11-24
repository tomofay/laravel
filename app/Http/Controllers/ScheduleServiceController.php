<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ScheduleServiceController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'nama_poli' => 'required',
            'deskripsi' => 'required',
        ];

        // Jika request menghendaki JSON (Ajax), balas JSON saat gagal
        if ($request->expectsJson() || $request->ajax()) {
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validasi gagal',
                    'errors'  => $validator->errors(),
                ], 422); // Unprocessable Entity
            }

            DB::table('services')->insert([
                'nama_poli' => $request->nama_poli,
                'deskripsi' => $request->deskripsi,
            ]);

            return response()->json([
                'message' => 'Layanan berhasil ditambahkan!',
            ], 201);
        }

        // Jalur non-Ajax: tetap pakai redirect back dengan errors/success
        $request->validate($rules); // otomatis redirect back dengan errors
        DB::table('services')->insert($request->only('nama_poli','deskripsi'));
        return redirect()->route('schedules.create')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }
}
