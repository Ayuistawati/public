<?php
namespace App\Http\Controllers;

use App\Models\Anggotakks; // Change from Kks to Anggotakks
use Illuminate\Http\Request;

class AnggotakksApiController extends Controller
{
    
    public function index()
    {
        return Anggotakks::all();
    }

   
    public function store(Request $request)
    {
        $anggotakks = new Anggotakks(); // Change from Kks to Anggotakks
        $anggotakks->fill($request->all())->save();
        return $anggotakks;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Anggotakks::find($id); // Change from Kks to Anggotakks
    }

    
    public function update(Request $request, string $id)
    {
        $anggotakks = Anggotakks::find($id); // Change from Kks to Anggotakks
        $anggotakks->fill($request->all())->save();
        return $anggotakks;
    }

   
    public function destroy(string $id)
    {
        $anggotakks = Anggotakks::find($id); // Change from Kks to Anggotakks
        $anggotakks->delete();
    }
}
