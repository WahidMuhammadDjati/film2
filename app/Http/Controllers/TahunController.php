<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
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
         $tahuns = Tahun::all(); // Ambil semua film dari database

        return view('createt', compact('tahuns'));
        // return view('createg'); // View untuk form tambah film
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_tahun' => 'required|integer|digits:4',
        ]);

        // Upload gambar
        // $gambarPath = $request->store('genre', 'public');

        // Simpan ke database
        Tahun::create([
            'nama_tahun' => $request->nama_tahun,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Tahun berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tahun $tahun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tahun = Tahun::findOrFail($id); // Ambil data genre berdasarkan ID
        $tahuns = Tahun::all(); // Ambil semua genre (jika perlu untuk select dropdown)
        
        return view('editt-form', compact('tahun', 'tahuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tahun' => 'required|string|max:4', // Tahun biasanya terdiri dari 4 digit
        ]);
    
        $tahun = Tahun::findOrFail($id);
        $tahun->nama_tahun = $request->nama_tahun;
        $tahun->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Tahun berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // menghapus data film
    {
        $tahun = Tahun::findOrFail($id);
        $tahun->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil dihapus!');
    }
}
