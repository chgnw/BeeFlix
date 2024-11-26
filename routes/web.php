<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/movies', [MovieController::class, 'showAllMovies'])->name('show.movies');
Route::get('/movies/create', [MovieController::class, 'showForm'])->name('add.movies');
Route::post('/movies', [MovieController::class, 'storeNewMovie'])->name('store.movies');
Route::delete('/movies/{movies}', [MovieController::class, 'deleteMovie'])->name('delete.movies');

