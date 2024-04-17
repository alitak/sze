<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;

class BooksController extends Controller
{

    public function index()
    {

    }

    public function show(Book $book): View
    {
        return view('books.show', [
            'book'     => $book,
            'comments' => $book->comments()->paginate(1),
        ]);
    }
}
