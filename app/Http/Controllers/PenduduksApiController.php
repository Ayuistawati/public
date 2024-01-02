<?php
namespace App\Http\Controllers;

use App\Models\Penduduks; 
use Illuminate\Http\Request;

class PenduduksApiController extends Controller
{
    
    public function index()
    {
        return Penduduks::all();
    }

   
    public function store(Request $request)
    {
        $penduduks = new Penduduks(); 
        $penduduks->fill($request->all())->save();
        return $penduduks;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Penduduks::find($id); 
    }

    
    public function update(Request $request, string $id)
    {
        $penduduks = Penduduks::find($id); 
        $penduduks->fill($request->all())->save();
        return $penduduks;
    }

   
    public function destroy(string $id)
    {
        $penduduks = Penduduks::find($id); 
        $penduduks->delete();
    }
}
