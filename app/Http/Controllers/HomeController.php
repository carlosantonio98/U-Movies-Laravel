<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Visit;

class HomeController extends Controller
{
    public function __invoke() 
    {
        [$latestMoviesUploaded, $totalMovies] = $this->getLatestMoviesUploaded();

        $premiereMovies       = Movie::whereActive(2)->wherePremier(2)->latest('activation_date')->limit(12)->get();
        $latestPremiereMovies = $this->getLatestPremiereMoviesForCarousel();
        $mostVisitedMovies    = Visit::groupBy('movie_id')->selectRaw('Count(movie_id) as total, movie_id')->latest('total')->limit(12)->get();
        
        $totalPremiereMovies = Movie::whereActive(2)->wherePremier(2)->count();

        return view('home.index', compact('latestMoviesUploaded','premiereMovies','latestPremiereMovies','totalPremiereMovies','totalMovies','mostVisitedMovies'));
    }

    private function getLatestMoviesUploaded()
    {
        $currentMonth = date('m');
        $currentYear = date('Y');
        $latestMoviesUploaded = Movie::whereActive(2)
            ->whereMonth('activation_date', '=', $currentMonth)
            ->whereYear('activation_date', '=', $currentYear)
            ->latest('activation_date');

        $totalMovies = $latestMoviesUploaded->count();

        return [
            $latestMoviesUploaded->limit(12)->get(), 
            $totalMovies
        ];
    }

    private function getLatestPremiereMoviesForCarousel()
    {
        $latestPremiereMovies = [];
        $imageLatestPremiereMovies = Movie::whereActive(2)->wherePremier(2)->latest('activation_date')->limit(6)->get(['img_slide', 'name', 'slug']);
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
