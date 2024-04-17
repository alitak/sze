@extends('layouts.app')

@section('content')
    <h2>{{ $book->title }}</h2>
    <h4>{{ $book->author }}</h4>
    @if($book->category)
        <span class="badge text-bg-secondary">
        {{ $book->category->title }}
    </span>
    @endif
    <img src="{{ $book->image }}" class="d-block" alt="{{ $book->title }}" style="width: 200px;">
    <hr>
    <h5>Hozzászólások</h5>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <div class="mb-3">
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="3"
                          placeholder="hozzászólás"></textarea>
            @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Elküld</button>
    </form>
    <div>
        @foreach($comments as $comment)
            <p>
                #{{ $comment->id }} -
                {{ $comment->content }} -
                {{ $comment->created_at->diffForHumans() }}
            </p>
        @endforeach
        {{ $comments->links() }}
    </div>
@endsection
