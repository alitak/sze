<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('books', [
        'books' => DB::table('books')->get(),
    ]);
});

Route::get('{id}/show', function ($id) {
    // SELECT * FROM BOOKS WHERE id=1
    $book = DB::table('books')->where('id', '=', $id)->first();

    if ($book === null) {
        abort(404);
    }

    return view('show', [
        'book' => $book,
    ]);
});
