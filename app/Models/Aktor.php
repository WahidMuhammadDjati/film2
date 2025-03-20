<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktor extends Model
{
    protected $table = 'aktor';
    protected $fillable =['nama_aktor'];
    public function films()
{
    return $this->belongsToMany(Film::class, 'film_aktor','aktor_id','film_id');
}

    
}
