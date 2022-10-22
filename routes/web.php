<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies', [MovieController::class, 'movies'])->name('movies.movies');
Route::get('movies/new', [MovieController::class, 'new'])->name('movies.new');
Route::get('movies/premiere', [MovieController::class, 'premiere'])->name('movies.premiere');
Route::get('movies/{movie}/show', [MovieController::class, 'show'])->name('movies.show');
Route::get('movies/category/{category}', [MovieController::class, 'category'])->name('movies.category');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});