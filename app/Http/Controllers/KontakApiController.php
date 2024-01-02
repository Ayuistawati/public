<?php
namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakApiController extends Controller
{
    
    public function index()
    {
        return Kontak::all();
    }

   
    public function store(Request $request)
    {
        $kontak = new Kontak();
        $kontak->fill($request->all())->save();
        return $kontak;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Kontak::find($id);
    }

    
    public function update(Request $request, string $id)
    {
        $kontak = Kontak::find($id);
        $kontak->fill($request->all())->save();
        return $kontak;
    }

   
    public function destroy(string $id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();
    }
}
