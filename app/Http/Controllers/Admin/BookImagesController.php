<?php

declare(strict_types=1);


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookImagesController extends Controller
{
    public function __invoke(Book $book)
    {
        Storage::disk('images')->delete($book->image_url);

        $book->update([
            'image_url' => null,
        ]);

        return response()->noContent();
    }
}
