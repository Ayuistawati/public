<?php

namespace App\Http\Controllers;

use App\Models\Kks;
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
        $kks = Kks::create($request->all());
        return redirect()->route('kks.index')->with('success', 'Kks created successfully!');
    }

    public function show($id)
    {
        $kks = Kks::findOrFail($id);
        return view('kks.show', ['kks' => $kks]);
    }

    public function edit($id)
    {
        $kks = Kks::findOrFail($id);
        return view('kks.edit', ['kks' => $kks]);
    }

    public function update(Request $request, $id)
    {
        $kks = Kks::findOrFail($id);
        $kks->update($request->all());
        return redirect()->route('kks.index')->with('success', 'Kks updated successfully!');
    }

    public function destroy($id)
    {
        $kks = Kks::findOrFail($id);
        $kks->delete();
        return redirect()->route('kks.index')->with('success', 'Kks deleted successfully!');
    }
}
