<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(Request $request): View
    {
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
        return view('admin.books.index', [
            'books'      => Book::query()->with('category')->search($request)->paginate(5)->withQueryString(),
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
        Book::query()->create($request->validated());

        // visszairányítás
        return redirect()->route('books.index')->with('success', 'Sikeres mentés');
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
        $book->update($request->validated());

        // visszairányítás
        return redirect()->route('books.index')->with('success', 'Sikeres mentés');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Sikeres törlés');
    }
}
