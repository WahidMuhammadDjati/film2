<?php

use App\Http\Controllers\TahunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NegaraController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/home');   
})->name('logout');
Route::get('/registrasi', [RegisterController::class, 'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [RegisterController::class, 'registrasi']);


// Dashboard User
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('user.dashboard')->middleware('auth');

// Dashboard Admin
Route::get('/admin', function () {
    return view('dashboardadmin');
})->name('admin.dashboard')->middleware('auth');

// dashboard 
Route::get('/dashboard', [FilmController::class, 'index'])->name('user.dashboard')->middleware('auth');


// Film show
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



// Negara
Route::get('createn', [NegaraController::class, 'create'])->name('negara.create');
// Negara create
Route::post('/negara/store', [NegaraController::class, 'store'])->name('negara.store');



// Route::resource('films', FilmController::class);
// Route::get('/films', [FilmController::class, 'index'])->name('films.index');
// Route::post('/films', [FilmController::class, 'store'])->name('films.store');
