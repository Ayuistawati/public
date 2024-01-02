<?php

namespace App\Http\Controllers;

use App\Models\Anggotakks;
use App\Models\Kks;
use App\Models\Penduduks;
use App\Models\Hubungankks;
use Illuminate\Http\Request;

class AnggotakksController extends Controller
{
    public function index()
    {
        $anggotakks = Anggotakks::all();
        return view('anggotakks.index', compact('anggotakks'));
    }

    public function create()
    {
        $kksList = Kks::all();
        $penduduksList = Penduduks::all();
        $hubungankksList = Hubungankks::all();

        return view('anggotakks.create', compact('kksList', 'penduduksList', 'hubungankksList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_id' => 'required',
            'penduduk_id' => 'required',
            'hubungankk_id' => 'required',
            // Add any other validation rules as needed
        ]);

        // Get Kks model based on selected kk_id
        $kks = Kks::find($request->input('kk_id'));

        // Get statusaktif from the selected Kks model
        $statusaktif = $kks->statusaktif ?? false;

        Anggotakks::create([
            'kk_id' => $request->input('kk_id'),
            'penduduk_id' => $request->input('penduduk_id'),
            'hubungankk_id' => $request->input('hubungankk_id'),
            'statusaktif' => $statusaktif,
        ]);

        return redirect()->route('anggotakks.index')->with('success', 'Anggota KK berhasil ditambahkan.');
    }

    public function show($id)
    {
        $anggotakks = Anggotakks::find($id);
        return view('anggotakks.show', compact('anggotakks'));
    }

    public function edit($id)
    {
        $anggotakks = Anggotakks::find($id);
        $kksList = Kks::all();
        $penduduksList = Penduduks::all();
        $hubungankksList = Hubungankks::all();

        return view('anggotakks.edit', compact('anggotakks', 'kksList', 'penduduksList', 'hubungankksList'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kk_id' => 'required',
            'penduduk_id' => 'required',
            'hubungankk_id' => 'required',
            // Add any other validation rules as needed
        ]);

        $anggotakks = Anggotakks::find($id);

        // Get statusaktif from the selected Kks model
        $kks = Kks::find($request->input('kk_id'));
        $statusaktif = $kks->statusaktif ?? false;

        $anggotakks->update([
            'kk_id' => $request->input('kk_id'),
            'penduduk_id' => $request->input('penduduk_id'),
            'hubungankk_id' => $request->input('hubungankk_id'),
            'statusaktif' => $statusaktif,
        ]);

        return redirect()->route('anggotakks.index')->with('success', 'Anggota KK berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggotakks = Anggotakks::find($id);
        $anggotakks->delete();

        return redirect()->route('anggotakks.index')->with('success', 'Anggota KK berhasil dihapus.');
    }
}
