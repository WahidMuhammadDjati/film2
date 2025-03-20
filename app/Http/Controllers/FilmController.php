<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Aktor;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use App\Models\Komentar;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
            'genre_id' => 'required|array',
            'genre_id.*' => 'exists:genre,id',
            'tahun_id' => 'required|exists:tahun,id',
            'negara_id' => 'required|exists:negara,id',
            'aktor_id' => 'required|array', // Validasi multiple aktor
            'aktor_id.*' => 'exists:aktor,id',
            'durasi' => 'required|integer|min:1',
        ]);
    
        $gambarPath = $request->file('gambar')->store('films', 'public');
    
        $film = Film::create([
            'author_id' => Auth::id(),
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'trailer' => $request->trailer,
            'deskripsi' => $request->deskripsi,
            'tahun_id' => $request->tahun_id,
            'negara_id' => $request->negara_id,
            'durasi' => $request->durasi,
        ]);
    
        // Simpan genre ke tabel pivot
        $film->genres()->attach($request->genre_id);
    
        // Simpan aktor ke tabel pivot
        $film->aktors()->attach($request->aktor_id);
    
        return redirect()->route('films.createf')->with('success', 'Film berhasil ditambahkan!');
    }
    
    
    
    
    
        public function index() 
    {
        $slideFilms = Film::inRandomOrder()->limit(5)->get(); // Ambil 5 film acak tetap
        $films = Film::all(); // Semua film
        $genres = Genre::all(); // Semua genre
        $negaras = Negara::all(); // Semua negara
        $tahuns = Tahun::all(); // Semua tahun
        $ratings = Rating::all(); // Semua tahun
        // $slideFilms = Film::orderBy('rating', 'desc')->limit(5)->get();

        return view('dashboard', compact('slideFilms', 'films', 'genres', 'negaras', 'tahuns','ratings'));
    }

    public function indexx() // menampilkan data film ke dashboard admin
    {
        $films = Film::all();
        $genres = Genre::all(); // Mengambil semua genre dari tabel Genre
        $negaras = Negara::all(); // Mengambil semua negara dari tabel Negara
        $tahuns = Tahun::all(); // Mengambil semua tahun dalam bentuk array sederhana
        $aktors = Aktor::all(); // Mengambil semua tahun dalam bentuk array sederhana
        // return view('createf', compact('films')); // Kirim data ke 
        return view('createf', compact('films','genres', 'negaras', 'tahuns','aktors'));       
    }


    // $genres = Genre::all(); // Mengambil semua genre dari tabel Genre
    // $negaras = Negara::all(); // Mengambil semua negara dari tabel Negara
    // $tahuns = Tahun::pluck('tahun'); // Mengambil semua tahun dalam bentuk array sederhana

    // return view('films.create', compact('genres', 'negaras', 'tahuns'));
    
        public function destroy($id) // menghapus data film 
    {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()->route('films.createf')->with('success', 'Film berhasil dihapus!');
    }


    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $genres = Genre::all();
        $tahuns = Tahun::all();
        $negaras = Negara::all();
        $aktors = Aktor::all();
    
        return view('editf-form', compact('film', 'genres', 'tahuns', 'negaras','aktors'));
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
        'negara_id' => 'required|exists:negara,id',
        'aktor_id' => 'required|array', // Genre harus berupa array jika multiple
        'aktor_id.*' => 'exists:aktor,id',  // Pastikan negara ada di tabel negarass
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
        'durasi' => $request->durasi,
    ]);

    // Update genre jika ada
    if ($request->has('genre_id')) {
        $film->genres()->sync($request->genre_id);
    }
    if ($request->has('aktor_id')) {
        $film->aktors()->sync($request->aktor_id);
    }

    return redirect()->route('films.createf')->with('success', 'Film berhasil diperbarui!');
}




    public function show($id)
    {
        $film = Film::findOrFail($id);
        $komentar = Komentar::where('film_id', $id)->latest()->get(); // Ambil komentar berdasarkan film_id

        return view('film', compact('film', 'komentar'));
    }



    public function search(Request $request)
    {
        $query = $request->input('query');
        $films = Film::where('nama', 'like', "%$query%")->get();

       $slideFilms = Film::inRandomOrder()->limit(5)->get(); // Ambil 5 film acak tetap

        // $films = Film::all(); // Semua film
        $genres = Genre::all(); // Semua genre
        $negaras = Negara::all(); // Semua negara
        $tahuns = Tahun::all(); // Semua tahun
        $ratings = Rating::all(); // Semua tahun
        

        return view('dashboard', compact('slideFilms', 'films', 'genres', 'negaras', 'tahuns','ratings'));
    }



}