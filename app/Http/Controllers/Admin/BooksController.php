<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Traits\ImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    use ImageUpload;

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

    public function store(BookRequest $request): RedirectResponse
    {
        $validated = $this->getValidated($request);

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

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $validated = $this->getValidated($request);

        if ($request->has('image')) {
            if ($book->image_url) {
                Storage::disk('images')->delete($book->image_url);
            }
        }

        if (isset($validated['delete-image'])) {
            Storage::disk('images')->delete($book->image_url);
            $validated['image_url'] = null;
        }

        $book->update($validated);

        // visszairányítás
        return redirect()->route('admin.books.index')->with('success', 'Sikeres mentés');
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
