<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', HomeController::class)->name('home');

Route::get('books/{book}/show', [BooksController::class, 'show'])->name('books.show');

Route::resource('comments', CommentsController::class)->only(['store']);

Route::get('t', function () {
    $category = BookCategory::factory()->create();

    Book::factory()->for($category, 'category')->count(10)->create();
});
