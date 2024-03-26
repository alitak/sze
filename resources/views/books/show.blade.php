@extends('layouts.app')

@section('content')
    <h2>{{ $book->title }}</h2>
    @if($book->category)
        <span class="badge text-bg-secondary">
        {{ $book->category->title }}
    </span>
    @endif

    <img src="https://placedog.net/500/280" class="d-block" alt="{{ $book->title }}">
@endsection
