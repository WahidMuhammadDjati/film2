<?php
namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Negara;
use App\Models\Tahun;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $slideFilms = Film::inRandomOrder()->limit(5)->get(); // 5 film acak untuk carousel
        $films = Film::all();
        $genres = Genre::all();
        $tahuns = Tahun::all();
        $negaras = Negara::all();

        return view('dashboard', compact('films', 'slideFilms', 'genres', 'tahuns', 'negaras'));
    }
    
    public function filter(Request $request)
    {
        $query = Film::query();

        if ($request->filled('genre')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('genre.id', $request->genre);
            });
        }

        if ($request->filled('tahun')) {
            $query->where('tahun_id', $request->tahun);
        }

        if ($request->filled('negara')) {
            $query->where('negara_id', $request->negara);
        }

        $films = $query->get();
        $genres = Genre::all();
        $tahuns = Tahun::all();
        $negaras = Negara::all();

        // Tetap ambil 5 film acak untuk carousel, jangan berdasarkan filter
        $slideFilms = Film::inRandomOrder()->limit(5)->get();

        return view('dashboard', compact('films', 'slideFilms', 'genres', 'tahuns', 'negaras'));
    }
}
