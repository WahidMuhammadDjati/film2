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
            'isi_komentar' => 'required|string',
            'parent_id' => 'nullable|exists:komentars,id',
        ]);
    
        Komentar::create([
            'user_id' => Auth::id(),
            'film_id' => $film_id,
            'isi_komentar' => $request->isi_komentar,
            'parent_id' => $request->parent_id,
        ]);
    
        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    
}

