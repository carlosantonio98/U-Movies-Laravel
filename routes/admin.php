<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\MovieSupplierController;
use App\Http\Controllers\Admin\SupplierController;

Route::resource('categories', CategoryController::class);

Route::resource('movies', MovieController::class)->names('admin.movies');

Route::controller(MovieSupplierController::class)->group(function() {
    Route::get('movie-supplier/create/{movie}', 'create')->name('admin.movie-supplier.create');
    Route::post('movie-supplier/{movie}/store', 'store')->name('admin.movie-supplier.store');
    Route::delete('movie-supplier/{supplier}/{movie}', 'destroy')->name('admin.movie-supplier.destroy');
});

Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('suppliers', SupplierController::class)->names('admin.suppliers');
