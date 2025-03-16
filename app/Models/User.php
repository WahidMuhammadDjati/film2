<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
        
    }
    public function checkAdmin()
{
    // Memastikan pengguna login
    if (Auth::check()) {
        $user = Auth::user();
        // Cek apakah role pengguna adalah admin
        return Auth::user()->role === 'admin';
    }

    // Jika pengguna tidak login atau bukan admin
    return false;
}
    // public function posts():HasMany{
    //     return $this->hasMany(Post::class, 'author_id');
    // }
    
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    public function isAuthor()
    {
        return $this->role === 'author';
    }
        public function films()
    {
        return $this->hasMany(Film::class);
    }

    
}
