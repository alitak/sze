<?php

namespace App\Http\Controllers\Traits;

use App\Http\Requests\Admin\AlbumRequest;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait AdminAlbum
{
    public function albumStore(AlbumRequest $request): Album
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('albums', 'public');

            Image::read(Storage::disk('public')->get($validated['image']))
                ->scale(215, 160)
                ->save(Storage::disk('public')->path($validated['image']));
        }

        return Album::query()->create($validated);
    }
}
