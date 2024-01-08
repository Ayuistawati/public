<?php

namespace App\Http\Controllers;

use App\Models\Hubungankks;
use Illuminate\Http\Request;

class HubungankksController extends Controller
{
    public function index()
    {
        $hubungankksList = Hubungankks::all();
        return view('hubungankks.index', ['hubungankksList' => $hubungankksList]);
    }

    public function create()
    {
        return view('hubungankks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hubungankk' => 'required|string|unique:hubungankks', // Ensure 'agama' is unique in the 'agamas' table
        ]);

        try {
            Hubungankks::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { // MySQL duplicate entry error code
                return redirect()->route('hubungankks.create')->withErrors(['hubungankks' => 'Data already exists.']);
            }
        }

        return redirect()->route('hubungankks.index')->with('success', 'Data added successfully.');
    }


    public function show($id)
    {
        $hubungankks = Hubungankks::findOrFail($id);
        return view('hubungankks.show', ['hubungankks' => $hubungankks]);
    }

    public function edit($id)
    {
        $hubungankks = Hubungankks::findOrFail($id);
        return view('hubungankks.edit', ['hubungankks' => $hubungankks]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'hubungankk' => 'required|string|unique:hubungankks,hubungankk,' . $id, // Ensure 'agama' is unique, excluding the current record
        ]);

        try {
            $hubungankk = Hubungankks::find($id);
            $hubungankk->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { // MySQL duplicate entry error code
                return redirect()->route('hubungankks.edit', $id)->withErrors(['hubungankk' => 'Data already exists.']);
            }
        }

        return redirect()->route('hubungankks.index')->with('success', 'Data updated successfully.');
    }
    public function destroy($id)
    {
        $hubungankks = Hubungankks::findOrFail($id);
        $hubungankks->delete();
        return redirect()->route('hubungankks.index')->with('success', 'Hubungankks deleted successfully!');
    }
}
