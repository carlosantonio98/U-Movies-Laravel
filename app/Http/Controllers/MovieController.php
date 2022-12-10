<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Visit;
use App\Models\Category;

class MovieController extends Controller
{
    public function index()
    {
        $title = 'Películas';
        $movies = Movie::whereActive(2)->latest('activation_date')->paginate(18);

        return view('movies.index', compact('title', 'movies'));
    }

    public function search()
    {
        return view('movies.search');
    }

    public function show(Movie $movie) {
        if ($movie->active == 1) return redirect()->route('home');

        $categoriesId = $movie->categories
            ->pluck('id')
            ->toArray();

        $movies = Movie::with('categories')
            ->whereActive(2)
            ->whereNot('id', $movie->id)
            ->whereHas('categories', function($query) use ($categoriesId) {
                $query->whereIn('categories.id', $categoriesId);
            })
            ->latest('activation_date')
            ->limit(6)
            ->get();

        $suppliersThatAllowToSee = $movie->suppliersThatAllowToSee;
        $suppliersThatAllowToSeeAndDownload = $movie->suppliersThatAllowToSeeAndDownload;

        Visit::create(['movie_id' => $movie->id]);

        return view('movies.show', compact('movie', 'movies', 'suppliersThatAllowToSee', 'suppliersThatAllowToSeeAndDownload'));
    }
    
    public function category(Category $category) {
        $title = $category->name;
        $movies = $category->movies()->whereActive(2)->latest('activation_date')->paginate(18);

        return view('movies.category', compact('title', 'movies'));
    }

    public function new() {
        $title = 'Últimas subida';
        $currentMonth = date('m');
        $currentYear = date('Y');
        $movies = Movie::whereActive(2)
            ->whereMonth('activation_date', '=', $currentMonth)
            ->whereYear('activation_date', '=', $currentYear)
            ->latest('activation_date')
            ->paginate(18);

        return view('movies.new', compact('title', 'movies'));
    }

    public function premiere() {
        $title = 'Estrenos';
        $movies = Movie::whereActive(2)->wherePremier(2)->latest('activation_date')->paginate(18);

        return view('movies.premiere', compact('title', 'movies'));
    }
}
