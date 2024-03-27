<?php

use App\Http\Controllers\Admin\BookCategoriesController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\ImportBooksController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BooksController::class);

Route::group([
    'prefix'     => 'import-books',
    'controller' => ImportBooksController::class,
    'as'         => 'import-books.',
], static function () {
    Route::get('', 'index')->name('index');
    Route::post('', 'store')->name('store');
});

Route::resource('book-categories', BookCategoriesController::class);
