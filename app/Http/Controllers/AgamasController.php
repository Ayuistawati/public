<?php

// app/Http/Controllers/AgamasController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agamas;

class AgamasController extends Controller
{
    public function index()
    {
        $agamas = Agamas::all();
        return view('agamas.index', ['agamas' => $agamas]);
    }

    public function create()
    {
        return view('agamas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'agama' => 'required|string|unique:agamas', // Ensure 'agama' is unique in the 'agamas' table
        ]);

        try {
            Agamas::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { // MySQL duplicate entry error code
                return redirect()->route('agamas.create')->withErrors(['agama' => 'Data already exists.']);
            }
        }

        return redirect()->route('agamas.index')->with('success', 'Data added successfully.');
    }

    public function show($id)
    {
        $agama = Agamas::find($id);
        return view('agamas.show', ['agama' => $agama]);
    }

    public function edit($id)
    {
        $agama = Agamas::find($id);
        return view('agamas.edit', ['agama' => $agama]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'agama' => 'required|string|unique:agamas,agama,' . $id, // Ensure 'agama' is unique, excluding the current record
        ]);

        try {
            $agama = Agamas::find($id);
            $agama->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) { // MySQL duplicate entry error code
                return redirect()->route('agamas.edit', $id)->withErrors(['agama' => 'Data already exists.']);
            }
        }

        return redirect()->route('agamas.index')->with('success', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $agama = Agamas::find($id);
        $agama->delete();

        return redirect()->route('agamas.index')->with('success', 'Data deleted successfully.');
    }
}
