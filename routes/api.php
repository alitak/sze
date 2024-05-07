<?php

use App\Http\Controllers\Api\BooksController;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BooksController::class);
