<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;

class MoviesActivate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:activate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activate the movie when the activation date is met.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $movies = Movie::whereActive(1)->where('activation_date', '<=', now())->get();

        $movies->map(function($movie) {
            $movie->active = 2;
            $movie->save();
        });

        return Command::SUCCESS;
    }
}
