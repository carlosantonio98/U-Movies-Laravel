<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Visit;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Supplier;

class HomeController extends Controller
{
    public function index() {
        $numberVisits = Visit::all()->count();
        $numberMovies = Movie::all()->count();
        $numberCategories = Category::all()->count();
        $numberSuppliers = Supplier::all()->count();

        return view('admin.index', compact('numberVisits', 'numberMovies', 'numberCategories', 'numberSuppliers'));
    }
}
