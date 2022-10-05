<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Category;
use App\Models\Suggestion;
use App\Models\Supplier;
use App\Models\Visit;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        Storage::deleteDirectory('logos');
        Storage::makeDirectory('logos');  // crea esta carpeta en el storage
        
        Storage::deleteDirectory('covers');
        Storage::makeDirectory('covers');
        
        Storage::deleteDirectory('slides');
        Storage::makeDirectory('slides');

        $this->call(UserSeeder::class);
        Category::factory(9)->create();
        Suggestion::factory(10)->create();
        Supplier::factory(3)->create();
        $this->call(MovieSeeder::class);
        Visit::factory(100)->create();

    }
}
