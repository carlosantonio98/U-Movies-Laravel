<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{    
    public function show(Movie $movie) {
        $movies = Movie::latest('created_at')->limit(6)->get();

        return view('movies.show', compact('movie', 'movies'));
    }
}
