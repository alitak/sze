<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Book;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(CommentRequest $request)
    {
        $validated = $request->validated();

//        Book::query()->find($validated['book_id'])
//            ->comments()
//            ->create(['content' => $validated['content']]);

        Comment::query()->create($validated);

        return redirect()->route('books.show', $validated['book_id']);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        //
    }
}
