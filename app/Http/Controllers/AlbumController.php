<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Contracts\View\View;

class AlbumController extends Controller
{
    public function index(): View
    {
        return view('albums.index', [
            'title' => 'Albums',
            'albums' => Album::query()->with(['artist', 'label'])->get(),
        ]);
    }

    public function show(Album $album): View
    {
        return view('albums.show', [
            'title' => $album->title,
            'album' => $album,
        ]);
    }
}
