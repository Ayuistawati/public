<?php

namespace App\Http\Controllers;

use App\Models\Anggotakks;
use App\Models\Kks;
use App\Models\Penduduks;
use App\Models\Hubungankks;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AnggotakksController extends Controller
{
    public function index($nokk)
    {
        $kks = Kks::where('nokk', $nokk)->firstOrFail();
        $anggotakksList = Anggotakks::where('kk_id', $kks->nokk)->get();
        
        return view('anggotakks.index', ['kks' => $kks, 'anggotakksList' => $anggotakksList]);
    }

    public function create($nokk)
    {
        $kks = Kks::where('nokk', $nokk)->firstOrFail();
        $penduduksList = Penduduks::all();
        $hubungankksList = Hubungankks::all(); // Perbaikan disini

        return view('anggotakks.create', ['kks' => $kks, 'penduduksList' => $penduduksList, 'hubungankksList' => $hubungankksList]); // Perbaikan disini
    }

    public function store(Request $request, $nokk)
    {
        $validatedData = $request->validate([
            'penduduk_id' => [
                'required',
                Rule::unique('anggotakks', 'penduduk_id')->where(function ($query) use ($nokk) {
                    return $query->where('kk_id', $nokk);
                }),
            ],
            'hubungankk_id' => [
                'required',
                Rule::unique('anggotakks', 'hubungankk_id')->where(function ($query) use ($nokk) {
                    return $query->where('kk_id', $nokk);
                }),
            ],
            'statusaktif' => 'required',
        ]);
    
        // Tambahkan hubungankk_id ke validatedData
        $validatedData['hubungankk_id'] = $request->input('hubungankk_id');
    
        try {
            // Simpan anggota KK dengan hubungan
            Anggotakks::create([
                'kk_id' => $nokk,
                'penduduk_id' => $validatedData['penduduk_id'],
                'hubungankk_id' => $validatedData['hubungankk_id'],
                'statusaktif' => $validatedData['statusaktif'],
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->route('anggotakks.create', $nokk)->withErrors(['statusaktif' => 'Anggota dengan status aktif yang sama sudah ada.']);
            }
        }
    
        $kks = Kks::where('nokk', $nokk)->firstOrFail();
        return redirect()->route('kks.show', $kks->id)->with('success', 'Anggota KK ditambahkan berhasil!');
    }
    public function show($nokk, $id)
    {
        $kks = Kks::where('nokk', $nokk)->firstOrFail();
        $anggotakks = Anggotakks::findOrFail($id);
        return view('anggotakks.show', ['kks' => $kks, 'anggotakks' => $anggotakks]);
    }

    public function edit($nokk, $id)
    {
        $anggotakks = Anggotakks::findOrFail($id);
        $penduduksList = Penduduks::all();
        $hubungankksList = Hubungankks::all();
    
        return view('anggotakks.edit', [
            'anggotakks' => $anggotakks,
            'penduduksList' => $penduduksList,
            'hubungankksList' => $hubungankksList,
            'nokk' => $nokk,
        ]);
    }
    
    public function update(Request $request, $nokk, $id)
    {
        $anggotakks = Anggotakks::findOrFail($id);
    
        $validatedData = $request->validate([
            'penduduk_id' => 'required|exists:penduduks,id',
            'hubungankk_id' => 'required|exists:hubungankks,id',
            'statusaktif' => 'required|string',
        ]);
    
        $anggotakks->update([
            'penduduk_id' => $validatedData['penduduk_id'],
            'hubungankk_id' => $validatedData['hubungankk_id'],
            'statusaktif' => $validatedData['statusaktif'],
        ]);
    
        $kks = Kks::where('nokk', $nokk)->firstOrFail();

        return redirect()->route('kks.show', $kks->id)->with('success', 'Data anggota KK berhasil diperbarui!');    }
    
    

    public function destroy($nokk, $id)
    {
        $kks = Kks::where('nokk', $nokk)->firstOrFail();
        $anggotakks = Anggotakks::findOrFail($id);
        $anggotakks->delete();

        return redirect()->route('kks.show', $kks->id)->with('success', 'Data anggota KK berhasil dihapus!');
    }
}
