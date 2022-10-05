<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieSupplier>
 */
class MovieSupplierFactory extends Factory
{
    public function definition()
    {
        return [
            'page' => $this->faker->randomElement(['https://www.youtube.com/watch?v=n42mdgKaGv0', 'https://www.youtube.com/watch?v=JrJpvpGddQA']),
        ];
    }
}
