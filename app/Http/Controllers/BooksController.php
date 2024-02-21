<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

    public function store()
    {
        // formból adatok lekérése
        $title = request()->title;

        // adatok mentése
//        $book = new Book;
//        $book->title = $title;
//        $book->save();

        Book::query()->create([
            'title' => $title,
            //            'author' => '',
            //            'year'   => 2000,
        ]);

        // visszairányítás

    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book' => $book,
        ]);
    }
}
