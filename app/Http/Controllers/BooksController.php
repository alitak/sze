<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BooksController extends Controller
{
    public function index(): View
    {
//        $books = Book::query()->get();
//        $bookCategories = BookCategory::query()
//            ->whereIn('id', $books->pluck('category_id'))
//            ->pluck('title', 'id');
//
//        return view('books.index', [
//            'books'          => $books,
//            'bookCategories' => $bookCategories,
//        ]);

//        dd(Book::query()->with('category')->get()->toArray());

        return view('books.index', [
//            'books' => Book::query()->with('category')->get(),
            'books' => Book::query()->get()->load('category'),
        ]);
    }

    public function create(): View
    {
        return view('books.edit');
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
            'book' => $book,
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
