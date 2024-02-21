<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index']);

Route::get('books', [BooksController::class, 'index'])->name('books.index');
Route::get('books/create', [BooksController::class, 'create'])->name('books.create');
Route::post('books', [BooksController::class, 'store'])->name('books.store');
Route::get('books/{book}/show', [BooksController::class, 'show'])->name('books.show');
