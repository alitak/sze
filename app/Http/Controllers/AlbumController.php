<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Contracts\View\View;

class AlbumController extends Controller
{
    public function index(): View
    {
        return view('albums.index', [
            'title'  => 'Albums',
            'albums' => Album::get(),
        ]);
    }

//    public function show(int $id): View
    public function show(Album $album): View
    {
//        $album = Album::where('id', $id)->first();
//        if (!$album ) {
//            abort(404);
//        }

//        $album = Album::findOrFail($id);

        return view('albums.show', [
            'title' => $album->title,
            'album' => $album,
        ]);
    }
}
