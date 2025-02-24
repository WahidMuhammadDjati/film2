<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = ['nama', 'gambar', 'trailer', 'tahun_id', 'negara_id', 'rating', 'durasi', 'deskripsi'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }

    public function negara()
    {
        return $this->belongsTo(Negara::class);
    }
    public function Tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}





// use App\Models\Film;

// Film::create([
//     'nama' => 'The Matrix',
//     'gambar' => 'films/matrix.jpg',
//     'trailer' => 'https://www.youtube.com/watch?v=m8e-FF8MsqU',
//     'deskripsi' => 'Film fiksi ilmiah tentang dunia simulasi.',
//     'genre' => 'Sci-Fi',
//     'tahun' => '1999',
//     'negara' => 'USA',
//     'rating' => 9,
//     'durasi' => 136
// ]);
