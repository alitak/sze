<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BooksController extends Controller
{
    public function index(Request $request): View
    {
//        dump($request->all());
//        dd(
////            array_merge($request->all(), ['title' => 'foo'])
//            [
//                ...$request->all(),
//                'order'     => 'category',
//                'direction' => 'desc',
//                'title'     => 'foo',
//            ]
//        );


//        dd(
//            url()->current() . '?' . http_build_query([...$request->all(), '' => ''])
//        );
//
//        dd(
//            $request->all()
//        );


//        $books = Book::query()
//            // where (title LIKE "%great Brain%" OR title LIKE "%great%" OR title LIKE "%Brain%)"
//            ->where(function (Builder $query) {
//                $query
//                    ->where('title', 'LIKE', '%great Brain%')
//                    ->orWhere('title', 'LIKE', '%great%')
//                    ->orWhere('title', 'LIKE', '%Brain%');
//            })
//            ->where('category_id', 5)
////            ->dd()
//            ->paginate(5)
//            ->withQueryString()
//            //            ->toRawSql()
//        ;

        if ($request->order === 'category') {
            $orderBy = 'category_title';
        } else {
            $orderBy = in_array($request->order, ['author', 'year'])
                ? $request->order
                : 'title';
        }

        return view('admin.books.index', [
            'books'      => Book::query()
                ->select('books.*', 'book_categories.title as category_title')
                ->with('category')
                ->leftJoin('book_categories', 'category_id', 'book_categories.id')
                ->orderBy(
                    $orderBy,
                    $request->direction === 'desc' ? 'desc' : 'asc',
                )
                ->searchForAdmin($request)
                ->paginate(5)
                ->withQueryString(),
            'categories' => BookCategory::query()->orderBy('title')->pluck('title', 'id'),
        ]);
    }

    public function create(): View
    {
        return view('admin.books.edit', [
            'bookCategories' => BookCategory::query()->pluck('title', 'id'),
        ]);
    }

    public function store(BookRequest $request)
    {
//        $imagePath = $request->file('image')->store('images', ['disk' => 'public']);
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

        Book::query()->create($validated);

        // visszairányítás
        return redirect()->route('admin.books.index')->with('success', 'Sikeres mentés');
    }

    public function show(Book $book): View
    {
        $bookCategory = BookCategory::query()->where('id', $book->category_id)->first();

        return view('admin.books.show', [
            'book'         => $book,
            'bookCategory' => $bookCategory,
        ]);
    }

    public function edit(Book $book): View
    {
        return view('admin.books.edit', [
            'book'           => $book,
            'bookCategories' => BookCategory::query()->pluck('title', 'id'),
        ]);
    }

    public function update(BookRequest $request, Book $book)
    {
        $validated = $request->validated();

        if ($request->has('image')) {
            if ($book->image_url) {
                Storage::disk('images')->delete($book->image_url);
            }

            $imagePath = $request->file('image')?->store('', ['disk' => 'images']);
            $validated['image_url'] = $imagePath;
            unset($validated['image']);

            $manager = new ImageManager(new Driver());
            $image = $manager->read(Storage::disk('images')->path($imagePath));
            $image->scale(width: 500);
            $image->save();
        }

        $book->update($validated);

        // visszairányítás
//        return redirect()->route('admin.books.index')->with('success', 'Sikeres mentés');
    }

    public function destroy(Book $book)//: RedirectResponse
    {
        if ($book->image_url) {
            Storage::disk('images')->delete($book->image_url);
        }

        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Sikeres törlés');
    }
}
