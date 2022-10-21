<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Visit;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $latestMoviesUploaded = Movie::latest()->limit(12)->get();
        $premiereMovies = Movie::latest()->wherePremier(2)->limit(12)->get();
        $latestPremiereMovies = $this->getLatestPremiereMoviesForCarousel();
        $totalPremiereMovies = Movie::wherePremier(2)->count();
        $totalMovies = Movie::count();
        $mostVisitedMovies = Visit::with('movie')->groupBy('movie_id')->limit(12)->get(['movie_id']);

        return view('movies.index', compact('latestMoviesUploaded','premiereMovies','latestPremiereMovies','totalPremiereMovies','totalMovies','mostVisitedMovies'));
    }

    private function getLatestPremiereMoviesForCarousel()
    {
        $latestPremiereMovies = [];
        $imageLatestPremiereMovies = Movie::latest()->wherePremier(1)->limit(6)->get(['img_slide', 'name']);
        $position = 0;

        foreach ($imageLatestPremiereMovies as $movie) {
            $latestPremiereMovies[] = [
                'position' => $position,
                'image' => $movie->img_slide,
                'name' => $movie->name,
                'idCarouselItem' => 'carousel-item-' . ($position + 1),
                'idCarouselIndicator' => 'carousel-indicator-' . ($position + 1),
            ];
            $position++;
        }

        return $latestPremiereMovies;
{    
    public function show(Movie $movie) {
        $movies = Movie::latest('created_at')->limit(6)->get();

        return view('movies.show', compact('movie', 'movies'));
    }

    public function movies()
    {
        return view('movies.movies');
    }
}
