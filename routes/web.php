<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('books', [
        'books' => DB::table('books')->get(),
    ]);
});
