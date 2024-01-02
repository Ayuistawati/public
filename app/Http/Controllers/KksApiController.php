<?php
namespace App\Http\Controllers;

use App\Models\Kks; // Change from Penduduks to Kks
use Illuminate\Http\Request;

class KksApiController extends Controller
{
    
    public function index()
    {
        return Kks::all();
    }

   
    public function store(Request $request)
    {
        $kks = new Kks(); // Change from Penduduk to Kks
        $kks->fill($request->all())->save();
        return $kks;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Kks::find($id); // Change from Penduduk to Kks
    }

    
    public function update(Request $request, string $id)
    {
        $kks = Kks::find($id); // Change from Penduduk to Kks
        $kks->fill($request->all())->save();
        return $kks;
    }

   
    public function destroy(string $id)
    {
        $kks = Kks::find($id); // Change from Penduduk to Kks
        $kks->delete();
    }
}
