<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $genres = Genre::all(); // Ambil semua film dari database

        // return view('createg', compact('genres')); // Kirim data ke dashboard
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $genres = Genre::all(); // Ambil semua film dari database

        return view('createg', compact('genres'));
        // return view('createg'); // View untuk form tambah film
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_genre' => 'required|string|max:255',
        ]);

        // Upload gambar
        // $gambarPath = $request->store('genre', 'public');

        // Simpan ke database
        Genre::create([
            'nama_genre' => $request->nama_genre,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Genre berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id); // Ambil data genre berdasarkan ID
        $genres = Genre::all(); // Ambil semua genre (jika perlu untuk select dropdown)
        
        return view('editg-form', compact('genre', 'genres'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_genre' => 'required|string|max:255',
        ]);
    
        $genre = Genre::findOrFail($id);
        $genre->nama_genre = $request->nama_genre;
        $genre->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Genre berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) // menghapus data film
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil dihapus!');
    }
}
