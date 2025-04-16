<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AlbumController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        // headerben küldeni kell az Accept: application/json értéket
        $albums = Album::query()
            ->with('artist', 'label')
            ->paginate();
//
//        if (request()->wantsJson()) {
//            return AlbumResource::collection($albums);
//        }
//
//        return view('albums.index', [
//            'albums' => $albums,
//        ]);


        return AlbumResource::collection($albums);
    }

    public function show(Album $album)
    {
        return new AlbumResource($album);
    }
}
