<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    FilmController,
    RegisterController,
    AuthController,
    DashboardController,
    GenreController,
    CastController,
    PeranController,
    KritikController,
    ProfileController,
    UserController,
};

Route::get('/', [FilmController::class, 'movieHome'])->name('home');
Route::get('/movies', [FilmController::class, 'movies'])->name('movies');
Route::get('/movies/{film}', [FilmController::class, 'show'])->name('movies.show');
Route::get('/movies/genre/{genre}', [FilmController::class, 'moviesByGenre'])->name('genre');
Route::get('/search', [FilmController::class, 'search'])->name('movies.search');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login.login');
    Route::post('/authenticate', 'authenticate')->name('login.authenticate');
    Route::post('/logout', 'logout')->name('login.logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard/user', 'user')->name('dashboard.user');
    Route::get('/dashboard/admin', 'admin')->name('dashboard.admin');
});

Route::controller(GenreController::class)
    ->middleware(['auth', 'can:admin'])
    ->group(function () {
        Route::get('/genre', 'index')->name('genre.index');
        Route::get('/genre/create', 'create')->name('genre.create');
        Route::post('/genre', 'store')->name('genre.store');
        Route::get('/genre/{id}/edit', 'edit')->name('genre.edit');
        Route::put('/genre/{id}', 'update')->name('genre.update');
        Route::delete('/genre/{id}', 'destroy')->name('genre.delete');
    });

Route::resource('cast', CastController::class)->middleware(['auth', 'can:admin']);
Route::resource('film', FilmController::class)->except('show')->middleware(['auth', 'can:admin']);
Route::resource('peran', PeranController::class)->except('show')->middleware(['auth', 'can:admin']);

Route::post('/kritik', [KritikController::class, 'store'])
    ->name('kritik.store')
    ->middleware(['auth', 'can:user']);

Route::controller(ProfileController::class)
    ->middleware(['auth', 'can:user'])
    ->group(function () {
        Route::get('/profile', 'show')->name('profile.show');
        Route::get('/profile/edit', 'edit')->name('profile.edit');
        Route::put('/profile', 'update')->name('profile.update');
    });