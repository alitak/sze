@extends('layouts.app')

@section('content')
    <h2>{{ $book->title }}</h2>
    <span class="badge text-bg-secondary">
        {{ $book->category->title }}
    </span>

    <img src="https://placedog.net/500/280" class="d-block" alt="{{ $book->title }}">
@endsection
