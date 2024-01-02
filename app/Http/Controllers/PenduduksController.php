<?php

namespace App\Http\Controllers;

use App\Models\Penduduks;
use App\Models\Agamas;
use Illuminate\Http\Request;

class PenduduksController extends Controller
{
    public function index()
    {
        $penduduksList = Penduduks::all();
        return view('penduduks.index', ['penduduksList' => $penduduksList]);
    }

    public function create()
    {
        $agamasList = Agamas::all();
        return view('penduduks.create', ['agamasList' => $agamasList]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'lahir' => 'required|date',
            'agama_id' => 'required|exists:agamas,id',
        ]);

        $penduduks = Penduduks::create($validatedData);
        return redirect()->route('penduduks.index')->with('success', 'Penduduks created successfully!');
    }

    public function show($id)
    {
        $penduduks = Penduduks::findOrFail($id);
        return view('penduduks.show', ['penduduks' => $penduduks]);
    }

    public function edit($id)
    {
        $penduduks = Penduduks::findOrFail($id);
        $agamasList = Agamas::all();
        return view('penduduks.edit', ['penduduks' => $penduduks, 'agamasList' => $agamasList]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'lahir' => 'required|date',
            'agama_id' => 'required|exists:agamas,id',
        ]);

        $penduduks = Penduduks::findOrFail($id);
        $penduduks->update($validatedData);

        return redirect()->route('penduduks.index')->with('success', 'Penduduks updated successfully!');
    }

    public function destroy($id)
    {
        $penduduks = Penduduks::findOrFail($id);
        $penduduks->delete();
        return redirect()->route('penduduks.index')->with('success', 'Penduduks deleted successfully!');
    }
}
