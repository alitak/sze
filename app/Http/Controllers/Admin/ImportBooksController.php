<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImportBooksController extends Controller
{
    public function index(): View
    {
        return view('admin.import-books.index');
    }

    public function store(Request $request): RedirectResponse
    {
//        if (! is_dir('/var/www/storage/app/import-books/')) {
//            mkdir('/var/www/storage/app/import-books/');
//        }
//        dd(
//            move_uploaded_file(
//                $_FILES['csv']['tmp_name'],
//                '/var/www/storage/app/import-books/' . $_FILES['csv']['name'])
//        );
        $bookCategories = BookCategory::all()->pluck('id');

        $csvFileName = $request->file('csv')->store('', ['disk' => 'import-books']);
        $csvFile = fopen(Storage::disk('import-books')->path($csvFileName), 'r');
        $columns = array_flip(fgetcsv($csvFile));

        $books = [];
        while ($row = fgetcsv($csvFile)) {
            $books[] = [
                'title'           => $row[$columns['title']],
                'author'          => $row[$columns['authors']],
                'category_id'     => $bookCategories->random(1)[0],//BookCategory::query()->inRandomOrder()->first('id')->id,
                'year'            => $row[$columns['original_publication_year']] === '' ? null : $row[$columns['original_publication_year']],
                'image_url'       => $row[$columns['image_url']],
                'small_image_url' => $row[$columns['small_image_url']],
            ];
        }
        foreach (collect($books)->chunk(500) as $chunk) {
            Book::query()->upsert($chunk->toArray(), ['title', 'author'], ['category_id', 'year']);
        }

        return redirect()->route('admin.books.index')->with('success', 'Sikeres importálás');
    }
}
