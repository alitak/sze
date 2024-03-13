<?php

use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [SessionsController::class, 'create'])->name('login.create');
Route::post('login', [SessionsController::class, 'store'])->name('login.store');

Route::delete('logout', [SessionsController::class, 'destroy'])->name('logout');

Route::resource('books', BooksController::class);
Route::resource('book-categories', BookCategoriesController::class);

Route::get('t', function () {
    $category = BookCategory::factory()->create();

    Book::factory()->for($category, 'category')->count(10)->create();
});
