<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Visit;
use App\Models\Category;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $title = 'Movies';
        $movies = Movie::latest()->paginate(18);

        return view('movies.index', compact('title', 'movies'));
    }

    public function search()
    {
        return view('movies.search');
    }

    public function show(Movie $movie) {
        $movies = Movie::latest('created_at')->limit(6)->get();

        Visit::create(['movie_id' => $movie->id]);

        return view('movies.show', compact('movie', 'movies'));
    }
    
    public function category(Category $category) {
        $title = $category->name;
        $movies = $category->movies()->latest()->paginate(18);

        return view('movies.category', compact('title', 'movies'));
    }

    public function new() {
        $title = 'News';
        $currentMonth = date('m');
        $currentYear = date('Y');
        $movies = Movie::whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->latest()
            ->paginate(18);

        return view('movies.new', compact('title', 'movies'));
    }

    public function premiere() {
        $title = 'Premiere';
        $movies = Movie::wherePremier(2)->latest()->paginate(18);

        return view('movies.premiere', compact('title', 'movies'));
    }
}
