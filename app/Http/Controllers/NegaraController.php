<?php

namespace App\Http\Controllers;

use App\Models\Negara;
use Illuminate\Http\Request;

class NegaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $negaras = Negara::all(); // Ambil semua film dari database

        return view('createn', compact('negaras'));
        // return view('createg'); // View untuk form tambah film
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_negara' => 'required|string|max:255',
        ]);

        // Upload gambar
        // $gambarPath = $request->store('genre', 'public');

        // Simpan ke database
        Negara::create([
            'nama_negara' => $request->nama_negara,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Genre berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Negara $negara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $negara = Negara::findOrFail($id); // Ambil data genre berdasarkan ID
        $negaras = Negara::all(); // Ambil semua genre (jika perlu untuk select dropdown)
        
        return view('editn-form', compact('negara', 'negaras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_negara' => 'required|string|max:255',
        ]);
    
        $negara = Negara::findOrFail($id);
        $negara->nama_negara = $request->nama_negara;
        $negara->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Genre berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // menghapus data film
    {
        $negara = Negara::findOrFail($id);
        $negara->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil dihapus!');
    }
}
