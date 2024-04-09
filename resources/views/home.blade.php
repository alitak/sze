@extends('layouts.app')

@section('content')
    <div class="row">
        <form action="">
            <input type="text" name="term" class="form-control" value="{{ request()->term }}">
            <button class="btn btn-sm btn-outline-secondary" type="submit">Keresés</button>
        </form>
        @foreach ($latestBooks as $book)
            <div class="col-2">
                <div class="card">
{{--                    <img src="https://placedog.net/500/280" class="card-img-top" alt="{{ $book->title }}">--}}
                    <img src="{{ $book->image_url }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $book->title }}
                            @if($book->category)
                                <span class="badge text-bg-secondary">
                                {{ $book->category->title }}
                            </span>
                            @endif
                        </h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm">Tovább</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
