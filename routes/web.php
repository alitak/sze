<?php

use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\BooksController;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index']);

Route::resource('books', BooksController::class);
Route::resource('book-categories', BookCategoriesController::class);

Route::get('t', function () {
    $category = BookCategory::factory()->create();

    Book::factory()->for($category, 'category')->count(10)->create();
});
