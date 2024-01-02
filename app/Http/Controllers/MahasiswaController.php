<?php

// app/Http/Controllers/MahasiswaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }
   
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
    
        if (!$mahasiswa) {
            // Jika mahasiswa tidak ditemukan, tampilkan view khusus
            return view('mahasiswa.mahasiswa_not_found');
        }
    
        // Jika mahasiswa ditemukan, tampilkan view biasa
        return view('mahasiswa.show', compact('mahasiswa'));
    }
    
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswa,nim,'.$id,
            'jurusan' => 'required',
        ]);

        Mahasiswa::find($id)->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
