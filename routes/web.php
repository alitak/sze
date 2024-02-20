<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('books', [
        'books' => Book::query()->get(),
    ]);
});

Route::get('{book}/show', function (Book $book) {
//    dd($book);
    return view('show', [
        'book' => $book,
    ]);
});
