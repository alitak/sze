<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Contracts\View\View;

class BooksController extends Controller
{
    public function index(): View
    {
        return view('books.index', [
            'books' => Book::query()->get(),
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(BookRequest $request)
    {
        // formból adatok lekérése
        $title = $request->title;

        Book::query()->create([
            'title' => $title,
            //            'author' => '',
            //            'year'   => 2000,
        ]);

        // visszairányítás
//        return redirect()->back()->with('success', 'Sikeres mentés');
        return redirect()->route('books.index')->with('success', 'Sikeres mentés');
    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }
}
