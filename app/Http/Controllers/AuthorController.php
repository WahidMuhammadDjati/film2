<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Tahun;
use App\Models\Negara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index()
    {
        $films = Film::where('user_id', Auth::id())->get(); // Filter berdasarkan user yang login
        return view('author.dashboard', compact('films'));
    }
        // return view(view: 'author.dashboard');
    
 

        public function create()
        {
            $films = Film::where('user_id', Auth::id())->get(); // Hanya film milik author yang login
            $genres = Genre::all(); // Mengambil semua genre dari tabel Genre
            $negaras = Negara::all(); // Mengambil semua negara dari tabel Negara
            $tahuns = Tahun::all(); // Mengambil semua tahun dalam bentuk array sederhana
            
            return view('author-show', compact('films', 'genres', 'negaras', 'tahuns'));       
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
        'durasi' => 'required|integer|min:1',
    ]);

    // Upload gambar
    $gambarPath = $request->file('gambar')->store('films', 'public');

    // Simpan film ke database dengan user_id
    $film = Film::create([
        'user_id' => Auth::id(), // Set user_id sesuai author yang login
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

    return redirect()->route('author.dashboard')->with('success', 'Film berhasil ditambahkan!');
}

        

}
