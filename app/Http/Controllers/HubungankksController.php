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
        $hubungankks = Hubungankks::create($request->all());
        return redirect()->route('hubungankks.index')->with('success', 'Hubungankks created successfully!');
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
        $hubungankks = Hubungankks::findOrFail($id);
        $hubungankks->update($request->all());
        return redirect()->route('hubungankks.index')->with('success', 'Hubungankks updated successfully!');
    }

    public function destroy($id)
    {
        $hubungankks = Hubungankks::findOrFail($id);
        $hubungankks->delete();
        return redirect()->route('hubungankks.index')->with('success', 'Hubungankks deleted successfully!');
    }
}
