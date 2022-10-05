<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    public function definition()
    {
        $name      = $this->faker->unique()->sentence(3);
        $imageName = $this->faker->image('public/storage/logos', 320, 240, null, false);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'logo' => 'logos/' . $imageName
        ];
    }
}
