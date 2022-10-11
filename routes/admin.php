<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;

Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('suppliers', SupplierController::class)->names('admin.suppliers');