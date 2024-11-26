<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    //
    public function showAllMovies() {
        $movies = Movie::paginate(4);

        return view('homepage', compact('movies'));
    }

    public function showForm() {
        $genres = Genre::all();

        return view('addMovie', compact('genres'));
    }

    public function storeNewMovie(Request $request) {
        // Bikin validation untuk input form nya
        $request->validate([
            'genre_id' => 'required|exists:genres,id',
            'photo' => 'required|image|max:5120',
            'title' => 'required|max:30',
            'description' => 'required|max:50',
            'publish_date' => 'required|date|before_or_equal:today',
        ]);

        // Upload photo
        $photoPath = $request->file('photo')->store('images', 'public');

        // Create new movie
        Movie::create([
            'genre_id' => $request->genre_id,
            'photo' => $photoPath,
            'title' => $request->title,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
        ]);

        return redirect()->route('show.movies')->with('success', 'Movie added');
    }

    public function deleteMovie($id) {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('show.movies')->with('success', 'Movie removed');
    }
}
