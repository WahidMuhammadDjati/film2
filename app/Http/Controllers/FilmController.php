<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

class FilmController extends Controller
{
    // public function create()
    // {
    //     return view('films.create'); // view untuk form tambah film
    // }
    //     public function createf() // menampilkan form tambah film
    // {
    //     $films = Film::all();
    //     return view('createf');
    // }


    public function store(Request $request) 
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trailer' => 'required|url',
            'deskripsi' => 'required',
            'genre_id' => 'required|array', // Pastikan genre dikirim sebagai array
            'genre_id.*' => 'exists:genre,id', // Pastikan setiap genre valid
            'tahun_id' => 'required|exists:tahun,id',
            'negara_id' => 'required|exists:negara,id',
            'rating' => 'required|integer|min:1|max:10',
            'durasi' => 'required|integer|min:1',
        ]);
    
        // Upload gambar
        $gambarPath = $request->file('gambar')->store('films', 'public');
    
        // Simpan film ke database
        $film = Film::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'trailer' => $request->trailer,
            'deskripsi' => $request->deskripsi,
            'tahun_id' => $request->tahun_id,
            'negara_id' => $request->negara_id,
            'rating' => $request->rating,
            'durasi' => $request->durasi,
        ]);
    
        // Simpan genre ke tabel pivot
        $film->genres()->attach($request->genre_id);
    
        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil ditambahkan!');
    }
    
    
    public function index() //menampilkan data film ke dashboard user
    {
        $films = Film::all(); // Ambil semua film dari database

        return view('dashboard', compact('films')); // Kirim data ke dashboard
    }
    public function indexx() // menampilkan data film ke dashboard admin
    {
        $films = Film::all();
        $genres = Genre::all(); // Mengambil semua genre dari tabel Genre
        $negaras = Negara::all(); // Mengambil semua negara dari tabel Negara
        $tahuns = Tahun::all(); // Mengambil semua tahun dalam bentuk array sederhana

        // return view('createf', compact('films')); // Kirim data ke 
        return view('createf', compact('films','genres', 'negaras', 'tahuns'));
        
    }


    // $genres = Genre::all(); // Mengambil semua genre dari tabel Genre
    // $negaras = Negara::all(); // Mengambil semua negara dari tabel Negara
    // $tahuns = Tahun::pluck('tahun'); // Mengambil semua tahun dalam bentuk array sederhana

    // return view('films.create', compact('genres', 'negaras', 'tahuns'));
    
        public function destroy($id) // menghapus data film
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Film berhasil dihapus!');
    }


    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();
        $tahuns = Tahun::all();
        $negaras = Negara::all();
    
        return view('editf-form', compact('film', 'genres', 'tahuns', 'negaras'));
    }
    

    // **Controller Method untuk Update Film**

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'trailer' => 'required|url',
        'deskripsi' => 'required|string',
        'genre_id' => 'required|array', // Genre harus berupa array jika multiple
        'genre_id.*' => 'exists:genre,id', // Pastikan setiap genre ada di database
        'tahun_id' => 'required|exists:tahun,id', // Pastikan tahun ada di tabel tahuns
        'negara_id' => 'required|exists:negara,id', // Pastikan negara ada di tabel negarass
        'rating' => 'required|numeric|min:0|max:10',
        'durasi' => 'required|integer|min:1',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $film = Film::findOrFail($id);

    // Jika ada file gambar yang diunggah, update gambar terlebih dahulu
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('films', 'public');
        $film->gambar = $gambarPath;
    }

    // Update data film
    $film->update([
        'nama' => $request->nama,
        'trailer' => $request->trailer,
        'deskripsi' => $request->deskripsi,
        'tahun_id' => $request->tahun_id,
        'negara_id' => $request->negara_id,
        'rating' => $request->rating,
        'durasi' => $request->durasi,
    ]);

    // Update genre jika ada
    if ($request->has('genre_id')) {
        $film->genres()->sync($request->genre_id);
    }

    return redirect()->route('admin.dashboard')->with('success', 'Film berhasil diperbarui!');
}

}
