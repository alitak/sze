<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index']);

Route::get('books', [BooksController::class, 'index']);
Route::get('books/{book}/show', [BooksController::class, 'show']);
