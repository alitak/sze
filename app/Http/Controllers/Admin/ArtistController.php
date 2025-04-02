<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArtistRequest;
use App\Models\Artist;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ArtistController extends Controller
{
    public function index()
    {
        return view('admin.artists.index', [
            'artists' => Artist::query()->with('albums')->paginate(),
        ]);
    }

    public function create()
    {
        return view('admin.artists.create');
    }

    public function store(ArtistRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('artists', 'public');

            Image::read(Storage::disk('public')->get($validated['image']))
                ->scale(215, 160)
                ->save(Storage::disk('public')->path($validated['image']));
        }

        Artist::query()->create($validated);

        return redirect()->route('admin.artists.index')
            ->with('success', 'Artist created successfully.');
    }

    public function show(Artist $artist)
    {
        return view('admin.artists.show', [
            'artist' => $artist,
        ]);
    }

    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', [
            'artist' => $artist,
        ]);
    }

    public function update(ArtistRequest $request, Artist $artist)
    {
        $validated = $request->validated();

        if ($request->has('removeImage')
            && $artist->image
            && Storage::disk('public')->exists($artist->image)
        ) {
            Storage::disk('public')->delete($artist->image);
        }

        if ($request->hasFile('image')) {
            if ($artist->image && Storage::disk('public')->exists($artist->image)) {
                Storage::disk('public')->delete($artist->image);
            }

            $validated['image'] = $request->file('image')->store('artists', 'public');

            Image::read(Storage::disk('public')->get($validated['image']))
                ->scale(215, 160)
                ->save(Storage::disk('public')->path($validated['image']));
        } elseif ($request->has('removeImage')) {
            $validated['image'] = null;
        }

        $artist->update($validated);

        return redirect()->route('admin.artists.index')
            ->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        if ($artist->image && Storage::disk('public')->exists($artist->image)) {
            Storage::disk('public')->delete($artist->image);
        }

        $artist->delete();

        return redirect()->route('admin.artists.index')
            ->with('success', 'Artist deleted successfully.');
    }
}
