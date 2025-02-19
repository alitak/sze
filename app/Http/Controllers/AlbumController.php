<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AlbumController extends Controller
{
    public function index(): View
    {
        return view('albums.index', [
            'title' => 'Albums',
        ]);
    }

    public function show(): View
    {
        return view('albums.show', [
            'title' => 'Album',
        ]);
    }
}
