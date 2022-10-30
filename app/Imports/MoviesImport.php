<?php

namespace App\Imports;

use App\Models\Movie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;


class MoviesImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {

        foreach ($rows->slice(1) as $row) {
            $movie              = new Movie();
            $movie->name        = $row[0];
            $movie->year        = $row[1];
            $movie->slug        = Str::slug($row[0]);
            $movie->premier     = $row[2];
            $movie->img_cover   = '';
            $movie->img_slide   = '';
            $movie->trailer     = $row[3];
            $movie->extract     = $row[4];
            $movie->description = $row[5];
            $movie->user_id     = Auth::id();

            $movie->save();

            $movie->categories()->attach(json_decode($row[6]));

            for($i = 7; $i <= 17; $i = ($i + 2)) {

                if (! empty($row[$i])) {
                    $movie->suppliers()->attach($row[$i], ['page' => $row[$i+1], 'created_at' =>now()]);
                }

            }

        }

    }

}
