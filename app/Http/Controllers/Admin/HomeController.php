<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $numberVisits     = Visit::all()->count();
        $numberMovies     = Movie::all()->count();
        $numberCategories = Category::all()->count();
        $numberSuppliers  = Supplier::all()->count();

        // Chart 1
        $numberMoviesByCategories = Category::with('movies')->get()->map(fn($item, $key) => [ 'category' =>  $item['name'], 'number_movies' => $item['movies']->count() ]);
        $categoryData   = [];
        $categoryLabels = [];

        foreach($numberMoviesByCategories as $item) {
            array_push($categoryData,   $item['number_movies']);
            array_push($categoryLabels, $item['category']);
        }

        $dataForCategoriesChart = [
            'series' => [
                [
                    'name' => 'Películas',
                    'data' => $categoryData
                ]
            ],
            'categories' => $categoryLabels
        ];

        // Chart 2
        $numberMoviesBySuppliers = Supplier::with('moviesWithoutPivot')->get()->map(fn($item, $key) => [ 'supplier' =>  $item['name'], 'number_movies' => $item['moviesWithoutPivot']->count() ]);
        $supplierData   = [];
        $supplierLabels = [];

        foreach($numberMoviesBySuppliers as $item) {
            array_push($supplierData,   $item['number_movies']);
            array_push($supplierLabels, $item['supplier']);
        }

        $dataForSuppliersChart = [
            'series'     => $supplierData,
            'categories' => $supplierLabels
        ];

        // Chart 3
        $numberMoviesByMonths = Movie::select(DB::raw('count(*) as number_movies, MONTH(created_at) as date_month'))->whereYear('created_at', date('Y'))->groupBy(['date_month'])->get();
        $monthMovieData = array_fill(0, 12, 0);

        foreach($numberMoviesByMonths as $item) {
            $monthMovieData[$item['date_month'] - 1] = $item['movies_count'];
        }

        $dataForMoviesByMonthsChart = [
            'series' => [
                [
                    'name' => 'Películas',
                    'data' => $monthMovieData
                ]
            ],
            'categories' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        ];

        // Chart 4
        $numberVisitsByMonths = Visit::select(DB::raw('count(*) as visit_count, MONTH(created_at) as date_month'))->whereYear('created_at', date('Y'))->groupBy(['date_month'])->get();
        $monthVisitData      = array_fill(0, 12, 0);

        foreach($numberVisitsByMonths as $item) {
            $monthVisitData[$item['date_month'] - 1] = $item['visit_count'];
        }

        $dataForVisitsByMonthsChart = [
            'series' => [
                [
                    'name' => 'Visitas',
                    'data' => $monthVisitData
                ]
            ],
            'categories' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
        ];

        return view('admin.index', compact('numberVisits', 'numberMovies', 'numberCategories', 'numberSuppliers', 'dataForCategoriesChart', 'dataForSuppliersChart', 'dataForMoviesByMonthsChart', 'dataForVisitsByMonthsChart'));
    }
}
