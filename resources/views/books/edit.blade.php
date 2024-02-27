@extends('layouts.app')

@section('content')
    <h2 class="">
        Könyv szerkesztése:
        <span class="text-secondary">{{ $book->title }}</span>
    </h2>

    <form class="row" action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-8">
            <label for="title" class="form-label">Könyv címe</label>
            <input
                type="text"
                class="form-control @error('title')is-invalid @enderror"
                name="title"
                id="title"
                value="{{ old('title', $book->title) }}"
            >
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-12 mt-3">
            <button class="btn btn-primary" type="submit">Mentés</button>
        </div>
    </form>
@endsection
