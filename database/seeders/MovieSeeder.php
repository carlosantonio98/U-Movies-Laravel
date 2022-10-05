<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Movie;
use App\Models\MovieSupplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $movies = Movie::factory(20)->create();

        foreach($movies as $movie) {

            MovieSupplier::factory(3)->create([
                'movie_id' => $movie->id,
                'supplier_id' => rand(1, 3)
            ]);

            $movie->categories()->attach([
                rand(1, 4),
                rand(5, 9)
            ]);

            Comment::factory(12)->create([
                'movie_id' => $movie->id
            ]);

        }
    }
}
