<?php

namespace App\Http\Controllers;

use App\Models\Anggotakks;
use App\Models\Penduduks;
use App\Models\Hubungankks;
use Illuminate\Http\Request;

class AnggotakksApiController extends Controller
{
    public function index()
    {
        $anggotakks = Anggotakks::all();
        return response()->json(['data' => $anggotakks]);
    }

    public function show($id)
    {
        $anggotakks = Anggotakks::find($id);

        if (!$anggotakks) {
            return response()->json(['message' => 'Anggotakks not found'], 404);
        }

        return response()->json(['data' => $anggotakks]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kk_id' => 'required|exists:kks,nokk',
            'penduduk_id' => 'required|exists:penduduks,nama',
            'hubungankk_id' => 'required|exists:hubungankks,hubungankk',
            'statusaktif' => 'required',
        ]);

        $penduduk = Penduduks::where('nama', $request->input('penduduk_id'))->first();
        $hubungankk = Hubungankks::where('hubungankk', $request->input('hubungankk_id'))->first();

        $anggotakks = Anggotakks::create([
            'kk_id' => $request->input('kk_id'),
            'penduduk_id' => $penduduk->id,
            'hubungankk_id' => $hubungankk->id,
            'statusaktif' => $request->input('statusaktif'),
        ]);

        return response()->json(['message' => 'Anggotakks created successfully', 'data' => $anggotakks], 201);
    }

    public function update(Request $request, $id)
    {
        $anggotakks = Anggotakks::find($id);

        if (!$anggotakks) {
            return response()->json(['message' => 'Anggotakks not found'], 404);
        }

        $request->validate([
            'kk_id' => 'required|exists:kks,nokk',
            'penduduk_id' => 'required|exists:penduduks,nama',
            'hubungankk_id' => 'required|exists:hubungankks,hubungankk',
            'statusaktif' => 'required',
        ]);

        $penduduk = Penduduks::where('nama', $request->input('penduduk_id'))->first();
        $hubungankk = Hubungankks::where('hubungankk', $request->input('hubungankk_id'))->first();

        $anggotakks->update([
            'kk_id' => $request->input('kk_id'),
            'penduduk_id' => $penduduk->id,
            'hubungankk_id' => $hubungankk->id,
            'statusaktif' => $request->input('statusaktif'),
        ]);

        return response()->json(['message' => 'Anggotakks updated successfully', 'data' => $anggotakks]);
    }

    public function destroy($id)
    {
        $anggotakks = Anggotakks::find($id);

        if (!$anggotakks) {
            return response()->json(['message' => 'Anggotakks not found'], 404);
        }

        $anggotakks->delete();

        return response()->json(['message' => 'Anggotakks deleted successfully']);
    }
}
