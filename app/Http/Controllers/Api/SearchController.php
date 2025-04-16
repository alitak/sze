<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->input('search');

        $albums = Album::query()
            ->with('artist', 'label')
            ->whereHas('artist', fn($query) => $query->search($search))
            ->orWhere(fn($query) => $query->doesntHave('label')->orWhereHas('label', fn($query) => $query->search($search)))
            ->search($search)
            ->get();

        return AlbumResource::collection($albums);
    }
}
