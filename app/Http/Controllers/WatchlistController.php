<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WatchlistController extends Controller
{
    public function index()
    {
        // Ambil daftar watchlist dari session
        $watchlist = Session::get('watchlist', []);
        $films = Film::all();
        

        return view('watchlist', compact('watchlist','films'));
    }


    public function add(Request $request, $id)
    {
        // Ambil daftar watchlist dari session
        $watchlist = Session::get('watchlist', []);

        // Data film (contoh, nanti bisa ambil dari database jika perlu)
        $film = [
            'id' => $id,
            'nama' => $request->nama,
            'gambar' => $request->gambar,
            'trailer' => $request->trailer
        ];

        // Cek apakah film sudah ada di watchlist
        if (!array_key_exists($id, $watchlist)) {
            $watchlist[$id] = $film;
            Session::put('watchlist', $watchlist);
        }

        return redirect()->back()->with('success', 'Film ditambahkan ke watchlist!');
    }

    public function remove($id)
    {
        // Ambil daftar watchlist dari session
        $watchlist = Session::get('watchlist', []);

        // Hapus film dari watchlist
        if (isset($watchlist[$id])) {
            unset($watchlist[$id]);
            Session::put('watchlist', $watchlist);
        }

        return redirect()->back()->with('success', 'Film dihapus dari watchlist!');
    }
}
