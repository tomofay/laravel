<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    // Tampilkan semua data clients
    public function index()
    {
        $datas = Clients::all();
        $title = 'Clients'; // Tambahkan ini
        return view('clients.index', compact('datas', 'title'));
    }

    // Toggle status Aktif/Tidak Aktif
    public function toggleStatus($id)
    {
        $clients = Clients::findOrFail($id);
        $clients->Status = $clients->Status == 'Aktif' ? 'Tidak Aktif' : 'Aktif';
        $clients->save();

        return redirect()->route('clients.index')->with('success', 'Status user berhasil diubah!');
    }
}