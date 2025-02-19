<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
});

Route::get('albums', function () {
    return view('albums', [
        'title' => 'Albums',
    ]);
});
