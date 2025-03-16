<?php

use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\NegaraController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/film', function () {
    return view('film');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/dashboard');   
})->name('logout');

Route::get('/registrasi', [RegisterController::class, 'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [RegisterController::class, 'registrasi']);


// Dashboard User
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('user.dashboard');
// ->middleware('auth');
// Dashboard Admin
Route::get('/admin', function () {
    return view('dashboardadmin');
})->name('admin.dashboard')->middleware('auth');

// Dashboard 
Route::get('/dashboard', [FilmController::class, 'index'])->name('user.dashboard')->middleware('auth');

// Author
Route::get('/author', function () {
    return view('author');
})->name('author.dashboard')->middleware('auth');
    
Route::get('/author/film/create', [AuthorController::class, 'create'])->name('author.film.create');
Route::post('/author/film', [AuthorController::class, 'store'])->name('author.film.store');


// Route::middleware(['auth', 'author'])->group(function () {
//     Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
// });

// Search
Route::get('/search', [FilmController::class, 'search'])->name('search');


// Films show
// Route::get('/films/create', action: [FilmController::class, 'create'])->name('films.create');
Route::get('/createf', [FilmController::class, 'indexx'])->name('films.createf');
// Film create
Route::post('/films/store', [FilmController::class, 'store'])->name('films.store');
// Film delete
Route::delete('/films/{id}', action: [FilmController::class, 'destroy'])->name('films.destroy');
// Film edit
Route::get('/films/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
// Film update waktu edit
Route::put('/films/{id}', [FilmController::class, 'update'])->name('films.update');
// //Film show
Route::get('/film/{id}', [FilmController::class, 'show'])->name('film.show');



// Genre
Route::get('createg', [GenreController::class, 'create'])->name('genre.create');
// Genre create
Route::post('/genre/store', [GenreController::class, 'store'])->name('genre.store');
// Genre delete
Route::delete('/genre/{id}', action: [GenreController::class, 'destroy'])->name('genre.destroy');
// Genre edit
Route::get('/genre/{id}/edit', [GenreController::class, 'edit'])->name('genre.edit');
// Genre update waktu edit
Route::put('/genre/{id}', [GenreController::class, 'update'])->name('genre.update');


    
// Tahun
Route::get('createt', [TahunController::class, 'create'])->name('tahun.create');
// Tahun create
Route::post('/tahun/store', [TahunController::class, 'store'])->name('tahun.store');
// Tahun delete
Route::delete('/tahun/{id}', action: [TahunController::class, 'destroy'])->name('tahun.destroy');
// Tahun edit
Route::get('/tahun/{id}/edit', [TahunController::class, 'edit'])->name('tahun.edit');
// Tahun update waktu edit
Route::put('/tahun/{id}', [TahunController::class, 'update'])->name('tahun.update');




// Negara
Route::get('createn', [NegaraController::class, 'create'])->name('negara.create');
// Negara create
Route::post('/negara/store', [NegaraController::class, 'store'])->name('negara.store');
// Negara delete
Route::delete('/negara/{id}', action: [NegaraController::class, 'destroy'])->name('negara.destroy');
// Negara edit
Route::get('/negara/{id}/edit', [NegaraController::class, 'edit'])->name('negara.edit');
// Negara update waktu edit
Route::put('/negara/{id}', [NegaraController::class, 'update'])->name('negara.update');





// User
Route::get('/users', [UserController::class, 'index'])->name('users.index');
// User Edit
Route::put('/users/{id}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
// User delete
Route::delete('/delete/{id}', action: [UserController::class, 'destroy'])->name('users.destroy');

// Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
// 
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/films', [KategoriController::class, 'filter'])->name('kategori.films');


// Komentar
Route::post('/film/{film}/komentar', [KomentarController::class, 'store'])->middleware('auth')->name('komentar.store');

// Rating
Route::post('/films/{film}/rate', [RatingController::class, 'store'])->name('ratings.store');


// use App\Http\Controllers\WatchlistController;
// use App\Http\Controllers\WatchlistController;

Route::middleware('auth')->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
    Route::post('/watchlist/add/{id}', [WatchlistController::class, 'add'])->name('watchlist.add');
    Route::post('/watchlist/remove/{id}', [WatchlistController::class, 'remove'])->name('watchlist.remove');
});


// Route::resource('films', FilmController::class);
// Route::get('/films', [FilmController::class, 'index'])->name('films.index');
// Route::post('/films', [FilmController::class, 'store'])->name('films.store');
