<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    public function definition()
    {
        $name      = $this->faker->unique()->sentence(3);
        $coverName = $this->faker->image('public/storage/covers', 240, 320, null, false);
        $slideName = $this->faker->image('public/storage/slides', 640, 480, null, false);

        return [
            'name' => $name,
            'year' => $this->faker->year('+10 years'),
            'extract' => $this->faker->text(250),
            'description' => $this->faker->text(2000),
            'img_cover' => 'covers/' . $coverName,
            'img_slide' => 'slides/' . $slideName,
            'trailer' => $this->faker->randomElement(['https://www.youtube.com/embed/i9VSSbXb0N4', 'https://www.youtube.com/embed/BPjbiZQmBI4']),
            'slug' => Str::slug($name),
            'premier' => $this->faker->randomElement([1, 2]),
            'user_id' => User::all()->random()->id
        ];
    }
}
