<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryIndex extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::where('name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.category-index', compact('categories'));
    }
}
