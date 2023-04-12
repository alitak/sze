<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostsController extends Controller
{
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::with('user')
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->paginate(10),
        ]);
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
