<?php
namespace App\Http\Controllers;

use App\Models\Hubungankks; // Change from Anggotakks to Hubungankks
use Illuminate\Http\Request;

class HubungankksApiController extends Controller
{
    
    public function index()
    {
        return Hubungankks::all();
    }

   
    public function store(Request $request)
    {
        $hubungankks = new Hubungankks(); // Change from Anggotakks to Hubungankks
        $hubungankks->fill($request->all())->save();
        return $hubungankks;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Hubungankks::find($id); // Change from Anggotakks to Hubungankks
    }

    
    public function update(Request $request, string $id)
    {
        $hubungankks = Hubungankks::find($id); // Change from Anggotakks to Hubungankks
        $hubungankks->fill($request->all())->save();
        return $hubungankks;
    }

   
    public function destroy(string $id)
    {
        $hubungankks = Hubungankks::find($id); // Change from Anggotakks to Hubungankks
        $hubungankks->delete();
    }
}
