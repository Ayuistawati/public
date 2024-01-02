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
            'agama' => 'required|string',
        ]);

        Agamas::create($validatedData);

        return redirect()->route('agamas.index');
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
            'agama' => 'required|string',
        ]);

        $agama = Agamas::find($id);
        $agama->update($validatedData);

        return redirect()->route('agamas.index');
    }

    public function destroy($id)
    {
        $agama = Agamas::find($id);
        $agama->delete();

        return redirect()->route('agamas.index');
    }
}
