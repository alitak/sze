@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <h2>
            <a href="/posts/show/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </h2>
        <h3>{{ $post->user->name }}</h3>
    @endforeach
@endsection
