<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Book;


class BooksController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::query()->get(),
        ]);
    }

    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }
}
