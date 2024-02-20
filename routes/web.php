<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('books', [
        'books' => Book::query()->get(),
    ]);
});

Route::get('{id}/show', function ($id) {
    return view('show', [
        'book' => Book::query()->where('id', $id)->firstOrFail(),
    ]);
});
