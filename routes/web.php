<?php

use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BooksController::class, 'index']);

Route::resource('books', BooksController::class);
