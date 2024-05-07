<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BooksController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return BookResource::collection(Book::query()->paginate());
    }


    public function show(Book $book): BookResource
    {
        return BookResource::make($book);
    }

    public function store(BookRequest $request): BookResource
    {
        $book = Book::query()->create($request->validated());

        return BookResource::make($book);
    }

    public function update(BookRequest $request, Book $book): BookResource
    {
        $book->update($request->validated());

        return BookResource::make($book);
    }

    public function destroy(int $id): Response
    {
        Book::query()->where('id', $id)->limit(1)->delete();

        return response()->noContent();
    }
}
