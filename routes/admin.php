<?php

use App\Http\Controllers\Admin\BookCategoriesController;
use App\Http\Controllers\Admin\BooksController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BooksController::class);
Route::resource('book-categories', BookCategoriesController::class);
