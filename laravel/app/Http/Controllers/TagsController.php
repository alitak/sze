<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagsController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('tags.index', [
            'tag' => $tag,
//            'jobs' => $tag->jobs->load('company'),
        ]);
    }
}
