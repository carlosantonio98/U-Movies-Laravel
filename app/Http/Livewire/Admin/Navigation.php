<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $options = [
            ['name' => 'Movies',     'route' => 'admin.movies.index'],
            ['name' => 'Categories', 'route' => 'admin.categories.index'],
            ['name' => 'Suppliers',  'route' => 'admin.suppliers.index'],
        ];

        return view('livewire.admin.navigation', compact('options'));
    }
}
