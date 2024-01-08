<?php

namespace App\Http\Controllers;

use App\Models\Kks;
use App\Models\Anggotakks;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KksController extends Controller
{
    public function index()
    {
        $kksList = Kks::all();
        return view('kks.index', ['kksList' => $kksList]);
    }

    public function create()
    {
        return view('kks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nokk' => 'required|unique:kks',
            'statusaktif' => 'required|in:aktif,tidak_aktif', 
        ]);
    
        $kks = Kks::create($validatedData);
        return redirect()->route('kks.index')->with('success', 'Kks created successfully!');
    }

    public function show($id)
    {
        $kks = Kks::findOrFail($id);
        $anggotaKksList = Anggotakks::where('kk_id', $kks->nokk)->get();
        
        return view('kks.show', compact('kks', 'anggotaKksList'));
    }
    public function edit($id)
    {
        $kks = Kks::findOrFail($id);
        return view('kks.edit', ['kks' => $kks]);
    }

    public function update(Request $request, $id)
    {
        $kks = Kks::findOrFail($id);
    
        $validatedData = $request->validate([
            'nokk' => [
                'required',
                Rule::unique('kks')->ignore($kks->id),
            ],
        ]);
    
        $kks->update($validatedData);
        return redirect()->route('kks.index')->with('success', 'Kks updated successfully!');
    }

    public function destroy($id)
    {
        $kks = Kks::findOrFail($id);
        $kks->delete();
        return redirect()->route('kks.index')->with('success', 'Kks deleted successfully!');
    }
}
