<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller {
    public function store(Request $request, Film $film) {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10'
        ]);

        Rating::updateOrCreate(
            ['user_id' => Auth::id(), 'film_id' => $film->id],
            ['rating' => $request->rating]
        );

        return back()->with('success', 'Rating berhasil dikirim!');
    }
}
