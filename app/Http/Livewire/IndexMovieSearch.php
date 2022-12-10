<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class IndexMovieSearch extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $movies = Movie::where('name', 'LIKE', '%' . $this->search . '%')
            ->whereActive(2)
            ->latest('activation_date')
            ->paginate(18);
        
        return view('livewire.index-movie-search', compact('movies'));
    }
}
