<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MovieController;

Route::resource('categories', CategoryController::class);

Route::resource('movies', MovieController::class)->names('admin.movies');