<?php

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait ImageUpload
{
    protected function getValidated(FormRequest $request): array
    {
        $validated = $request->validated();

        if ($request->has('image')) {
            $imagePath = $request->file('image')?->store('', ['disk' => 'images']);
            $validated['image_url'] = $imagePath;
            unset($validated['image']);

            $manager = new ImageManager(new Driver());
            $image = $manager->read(Storage::disk('images')->path($imagePath));
            $image->scale(width: 500);
            $image->save();
        }

        return $validated;
    }
}
