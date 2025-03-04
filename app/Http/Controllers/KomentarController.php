<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function store(Request $request, $film_id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:500',
        ]);

        Komentar::create([
            'film_id' => $film_id,
            'user_id' => Auth::id(),
            'isi_komentar' => $request->isi_komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}

