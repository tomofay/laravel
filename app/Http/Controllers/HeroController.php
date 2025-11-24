<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       return view('hero.index', [
        'title' => 'Hero',
        'datas' => Hero::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hero.create', [
            'title' => 'Hero'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if($request->aktif == 'on'){
        $aktif = 1;
        DB::table('hero')->where('aktif', 1)->update(['aktif' => 0]);
    } else {
        $aktif = 0;
    }
    $data = $request->only([
        'judul1',
        'judul2',
        'judul3',
        'url_image',
        'aktif'
    ]);
    $data['aktif'] = $aktif;
    $data['url_image'] = $request->file('url_image')->store('hero');
    Hero::create($data);
    return redirect()->route('hero.index')->with('success', 'Data Berhasil Ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $hero = Hero::findOrFail($id);
    return view('hero.edit', [
        'title' => 'Hero', // Ubah dari 'Edit Hero' ke 'Hero'
        'hero' => $hero
    ]);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $hero = Hero::findOrFail($id);

    if ($request->aktif == 'on') {
        $aktif = 1;
        DB::table('hero')->where('aktif', 1)->update(['aktif' => 0]);
    } else {
        $aktif = 0;
    }

    $data = $request->only([
        'judul1',
        'judul2',
        'judul3',
        'aktif'
    ]);
    $data['aktif'] = $aktif;

    // Jika ada file baru diupload
    if ($request->hasFile('url_image')) {
        $data['url_image'] = $request->file('url_image')->store('hero');
    }

    $hero->update($data);

    return redirect()->route('hero.index')->with('success', 'Data Berhasil Diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
    {
        $hero = Hero::findOrFail($id);

        // Hapus file gambar jika ada
        if ($hero->url_image && \Storage::exists($hero->url_image)) {
            \Storage::delete($hero->url_image);
        }

        $hero->delete();

        return redirect()->route('hero.index')->with('success', 'Data Berhasil Dihapus');
    }
}
