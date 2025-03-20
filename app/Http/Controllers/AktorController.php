<?php

namespace App\Http\Controllers;

use App\Models\Aktor;
use Illuminate\Http\Request;

class AktorController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $aktors = Aktor::all(); // Ambil semua film dari database

        return view('createa', compact('aktors'));
        // return view('createg'); // View untuk form tambah film
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_aktor' => 'required|string|max:255',
        ]);

        // Upload gambar
        // $gambarPath = $request->store('genre', 'public');

        // Simpan ke database
        Aktor::create([
            'nama_aktor' => $request->nama_aktor,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Genre berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aktor $aktor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aktor = Aktor::findOrFail($id); // Ambil data genre berdasarkan ID
        $aktors = Aktor::all(); // Ambil semua genre (jika perlu untuk select dropdown)
        
        return view('edita-form', compact('aktor', 'aktors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_aktor' => 'required|string|max:255',
        ]);
    
        $aktor = Aktor::findOrFail($id);
        $aktor->nama_aktor = $request->nama_aktor;
        $aktor->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Genre berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // menghapus data film
    {
        $aktor = Aktor::findOrFail($id);
        $aktor->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil dihapus!');
    }
}
