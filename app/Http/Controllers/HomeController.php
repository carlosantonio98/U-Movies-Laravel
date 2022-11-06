<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Visit;

class HomeController extends Controller
{
    public function __invoke() 
    {
        [$latestMoviesUploaded, $totalMovies] = $this->getLatestMoviesUploaded();

        $premiereMovies       = Movie::latest()->wherePremier(2)->limit(12)->get();
        $latestPremiereMovies = $this->getLatestPremiereMoviesForCarousel();
        $mostVisitedMovies    = Visit::with('movie')->groupBy('movie_id')->selectRaw('Count(movie_id) as total, movie_id')->latest('total')->limit(12)->get();
        
        $totalPremiereMovies = Movie::wherePremier(2)->count();

        return view('home.index', compact('latestMoviesUploaded','premiereMovies','latestPremiereMovies','totalPremiereMovies','totalMovies','mostVisitedMovies'));
    }

    private function getLatestMoviesUploaded()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');
        $latestMoviesUploaded = Movie::whereMonth('created_at', '=', $currentMonth)
            ->whereYear('created_at', '=', $currentYear)
            ->latest();

        $totalMovies = $latestMoviesUploaded->count();

        return [
            $latestMoviesUploaded->limit(12)->get(), 
            $totalMovies
        ];
    }

    private function getLatestPremiereMoviesForCarousel()
    {
        $latestPremiereMovies = [];
        $imageLatestPremiereMovies = Movie::latest()->wherePremier(2)->limit(6)->get(['img_slide', 'name', 'slug']);
        $position = 0;

        foreach ($imageLatestPremiereMovies as $movie) {
            $latestPremiereMovies[] = [
                'position' => $position,
                'image' => $movie->img_slide,
                'name' => $movie->name,
                'slug' => $movie->slug,
                'idCarouselItem' => 'carousel-item-' . ($position + 1),
                'idCarouselIndicator' => 'carousel-indicator-' . ($position + 1),
            ];
            $position++;
        }

        return $latestPremiereMovies;
    }
}
