<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DoctorsController extends Controller
{
    public function index()
    {
        // Ambil semua dokter aktif, urutkan dari yang paling lama
        $aktifDoctors = doctors::where('status', 1)->orderBy('id')->get();

        // Jika lebih dari 4, nonaktifkan yang terlama
        if ($aktifDoctors->count() > 4) {
            $toNonAktif = $aktifDoctors->slice(0, $aktifDoctors->count() - 4);
            foreach ($toNonAktif as $doctor) {
                $doctor->update(['status' => 0]);
            }
        }

        // Ambil semua data untuk ditampilkan
        $datas = doctors::all();

        return view('doctors.index', [
            'title' => 'Doctors',
            'datas' => $datas
        ]);
    }

    public function create()
    {
        return view('doctors.create', [
            'title' => 'Doctors'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'nama_dokter',
            'gelar_depan',
            'gelar_belakang',
            'spesialis',
            'jk',
            'alamat',
            'telepon',
            'agama',
        ]);

        // status checkbox -> integer 1/0
        $data['status'] = $request->has('status') ? 1 : 0;

        // Simpan gambar jika ada (standarkan ke disk 'public')
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('doctors', 'public');
        }

        // Batas maksimal 4 dokter aktif
        if ($data['status'] === 1) {
            $aktifDoctors = doctors::where('status', 1)->orderBy('id')->get();
            if ($aktifDoctors->count() >= 4) {
                $firstActive = $aktifDoctors->first();
                if ($firstActive) {
                    $firstActive->update(['status' => 0]);
                }
            }
        }

        doctors::create($data);

        return redirect()->route('doctors.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $data = doctors::findOrFail($id);
        $title = 'Doctors';
        return view('doctors.edit', compact('data', 'title'));
    }

    public function update(Request $request, $id)
    {
        $doctor = doctors::findOrFail($id);
        $data = $request->except('foto');

        // Jika status berubah menjadi aktif
        if (isset($data['status']) && (int)$data['status'] === 1 && (int)$doctor->status !== 1) {
            $aktifDoctors = doctors::where('status', 1)->orderBy('id')->get();
            if ($aktifDoctors->count() >= 4) {
                $firstActive = $aktifDoctors->first();
                if ($firstActive) {
                    $firstActive->update(['status' => 0]);
                }
            }
        }

        // Simpan foto baru (pakai disk 'public'), hapus foto lama jika ada
        if ($request->hasFile('foto')) {
            // Hapus lama jika tersimpan
            if ($doctor->foto && Storage::disk('public')->exists($doctor->foto)) {
                Storage::disk('public')->delete($doctor->foto);
            }
            $data['foto'] = $request->file('foto')->store('doctors', 'public');
        }

        $doctor->update($data);

        return redirect()->route('doctors.index')->with('success', 'Data dokter berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $doctor = doctors::findOrFail($id);

        // Hapus file foto jika ada (pakai disk 'public' sesuai penyimpanan)
        if ($doctor->foto && Storage::disk('public')->exists($doctor->foto)) {
            Storage::disk('public')->delete($doctor->foto);
        }

        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Data berhasil dihapus');
    }
}
