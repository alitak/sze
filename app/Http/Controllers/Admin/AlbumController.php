<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AlbumRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Label;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class AlbumController extends Controller
{
    public function index()
    {
        return view('admin.albums.index', [
            'albums' => Album::query()->with('artist', 'label')->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.albums.create', [
            'artists' => Artist::query()
                ->select('id', 'name')
                ->orderBy('name')
                ->pluck('name', 'id'),
            'labels' => Label::query()
                ->select('id', 'name')
                ->orderBy('name')
                ->pluck('name', 'id'),
        ]);
    }

    public function store(AlbumRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('albums', 'public');

            Image::read(Storage::disk('public')->get($validated['image']))
                ->scale(215, 160)
                ->save(Storage::disk('public')->path($validated['image']));
        }

        Album::query()->create($validated);

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album created successfully.');
    }

    public function show(Album $album)
    {
        return view('admin.albums.show', [
            'album' => $album,
        ]);
    }

    public function edit(Album $album)
    {
        return view('admin.albums.edit', [
            'album' => $album,
            'artists' => Artist::query()
                ->select('id', 'name')
                ->orderBy('name')
                ->pluck('name', 'id'),
            'labels' => Label::query()
                ->select('id', 'name')
                ->orderBy('name')
                ->pluck('name', 'id'),
        ]);
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $validated = $request->validated();

        if ($request->has('removeImage')
            && $album->image
            && Storage::disk('public')->exists($album->image)
        ) {
            Storage::disk('public')->delete($album->image);
        }

        if ($request->hasFile('image')) {
            if ($album->image && Storage::disk('public')->exists($album->image)) {
                Storage::disk('public')->delete($album->image);
            }

            $validated['image'] = $request->file('image')->store('albums', 'public');

            Image::read(Storage::disk('public')->get($validated['image']))
                ->scale(215, 160)
                ->save(Storage::disk('public')->path($validated['image']));
        } elseif ($request->has('removeImage')) {
            $validated['image'] = null;
        }

        $album->update($validated);

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album)
    {
        if ($album->image && Storage::disk('public')->exists($album->image)) {
            Storage::disk('public')->delete($album->image);
        }

        $album->delete();

        return redirect()->route('admin.albums.index')
            ->with('success', 'Album deleted successfully.');
    }
}
