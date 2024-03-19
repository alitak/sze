<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BooksController extends Controller
{
    public function __construct()
    {
//        $this->middleware(IsAdmin::class);
    }

    public function index(): View
    {
//        abort_unless(auth()->user()?->is_admin, 404);

        return view('books.index', [
            'books' => Book::query()->get()->load('category'),
        ]);
    }

    public function create(): View
    {
//        abort_unless(auth()->user()?->is_admin, 404);

        return view('books.edit', [
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

        return view('books.show', [
            'book'         => $book,
            'bookCategory' => $bookCategory,
        ]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
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
