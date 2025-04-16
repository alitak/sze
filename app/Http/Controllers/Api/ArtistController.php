<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArtistController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $artists = Artist::query()
            ->with(['albums' => ['artist', 'label']])
            ->paginate();

        return ArtistResource::collection($artists);
    }

    public function show(Artist $artist)
    {
        return new ArtistResource($artist->load(['albums' => ['artist', 'label']]));
    }
}
