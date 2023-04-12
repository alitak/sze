@extends('layouts.app')

@section('content')
    <div class="mb-4">
        {{ $posts->links() }}
    </div>

    <div class="mb-4">
        @foreach ($posts as $post)
            <article class="mb-4">
                <h2 class="text-3xl font-weight-bold mb-2">
                    <a href="/posts/show/{{ $post->id }}">
                        #{{ $post->id }} {{ $post->title }}
                    </a>
                </h2>
                <h3 class="text-2xl flex justify-between">
                    <span>{{ $post->user->name }}</span>
                    <span>{{ $post->created_at->diffForHumans() }}</span>
                </h3>
            </article>
        @endforeach
    </div>

    {{ $posts->links() }}
@endsection
