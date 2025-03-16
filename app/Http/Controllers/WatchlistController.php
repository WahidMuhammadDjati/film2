<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index()
    {
        // Ambil daftar watchlist dari database berdasarkan user yang login
        $watchlist = Watchlist::where('user_id', Auth::id())->with('film')->get();

        return view('watchlist', compact('watchlist'));
    }

    public function add($id)
    {
        // Pastikan film ada di database
        $film = Film::findOrFail($id);

        // Tambahkan ke watchlist
        Watchlist::firstOrCreate([
            'user_id' => Auth::id(),
            'film_id' => $film->id,
        ]);

        return redirect()->back()->with('success', 'Film ditambahkan ke watchlist!');
    }

    public function remove($id)
    {
        // Hapus film dari watchlist berdasarkan user yang login
        Watchlist::where('user_id', Auth::id())->where('film_id', $id)->delete();

        return redirect()->back()->with('success', 'Film dihapus dari watchlist!');
    }
}


