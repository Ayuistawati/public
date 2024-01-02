<?php

namespace App\Http\Controllers;

use App\Models\Agamas;
use Illuminate\Http\Request;

class AgamasApiController extends Controller
{
    public function index()
    {
        return Agamas::all();
    }

    public function create()
    {
        // Tampilkan formulir pembuatan data baru
        return view('agamas.create');
    }

    public function store(Request $request)
    {
        $agamas = new Agamas();
        $agamas->fill($request->all())->save();
        return $agamas;
    }

    public function show(string $id)
    {
        return Agamas::find($id);
    }

    public function update(Request $request, string $id)
    {
        $agamas = Agamas::find($id);
        $agamas->fill($request->all())->save();
        return $agamas;
    }

    public function destroy(string $id)
    {
        $agamas = Agamas::find($id);
        $agamas->delete();
    }
}
