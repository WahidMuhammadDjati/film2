<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Aktor;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $films = Film::where('author_id', Auth::id())->get(); // Filter berdasarkan user yang login
        return view('author.dashboard', compact('films'));
    }
        // return view(view: 'author.dashboard');
    
 

        public function create()
        {
            $films = Film::where('author_id', Auth::id())->get(); // Hanya film milik author yang login
            $genres = Genre::all(); // Mengambil semua genre dari tabel Genre
            $negaras = Negara::all(); // Mengambil semua negara dari tabel Negara
            $tahuns = Tahun::all(); // Mengambil semua tahun dalam bentuk array sederhana
            $aktors = Aktor::all(); // Mengambil semua tahun dalam bentuk array sederhana
            
            return view('author-show', compact('films', 'genres', 'negaras', 'tahuns','aktors'));       
        }

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
        'aktor_id' => 'required|array', // Validasi multiple aktor
        'aktor_id.*' => 'exists:aktor,id',
        'durasi' => 'required|integer|min:1',
    ]);

    // Upload gambar
    $gambarPath = $request->file('gambar')->store('films', 'public');

    // Simpan film ke database dengan user_id
    $film = Film::create([
        'author_id' => Auth::id(), // Set user_id sesuai author yang login
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

    $film->aktors()->attach($request->aktor_id);

    return redirect()->route('author.dashboard')->with('success', 'Film berhasil ditambahkan!');
}

public function edit($id)
{
    $film = Film::findOrFail($id);
    $genres = Genre::all();
    $tahuns = Tahun::all();
    $negaras = Negara::all();

    return view('author.film.create', compact('film', 'genres', 'tahuns', 'negaras'));
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
    'negara_id' => 'required|exists:negara,id', // Pastikan negara ada di tabel negaras
    'aktor_id' => 'required|array', // Genre harus berupa array jika multiple
    'aktor_id.*' => 'exists:aktor,id',
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

return redirect()->route('author.film.create')->with('success', 'Film berhasil diperbarui!');
}


public function destroy($id) // menghapus data film 
{
    $film = Film::findOrFail($id);
    $film->delete();

    return redirect()->route('author.film.create')->with('success', 'Film berhasil dihapus!');
}


}
