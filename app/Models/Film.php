<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    protected $table = 'films';
    protected $fillable = ['user_id','nama', 'gambar', 'trailer', 'tahun_id', 'negara_id', 'rating', 'durasi', 'deskripsi'];

    public function Genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre', 'film_id', 'genre_id');
    }

    public function Negara()
    {
        return $this->belongsTo(Negara::class);
    }
    public function Tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

        public function komentar()
    {
        return $this->hasMany(Komentar::class);
    }
    
    public function ratings() {
        return $this->hasMany(Rating::class);
    }
    
    public function getEmbedTrailerAttribute()
    {
        if (Str::contains($this->trailer, 'youtu.be')) {
            return Str::replace('youtu.be/', 'www.youtube.com/embed/', explode('?', $this->trailer)[0]);
        }

        if (Str::contains($this->trailer, 'watch?v=')) {
            return Str::replace('watch?v=', 'embed/', explode('?', $this->trailer)[0]);
        }

        return $this->trailer;
    }
        public function user()
    {
        return $this->belongsTo(User::class);
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
