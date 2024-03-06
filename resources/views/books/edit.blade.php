@extends('layouts.app')

@section('content')
    <h2 class="">
        @if(isset($book))
            Könyv szerkesztése:
            <span class="text-secondary">{{ $book->title }}</span>
        @else
            Új könyv
        @endif
    </h2>

    <form
            class="row"
            action="{{ isset($book) ? route('books.update', $book->id) : route('books.store') }}"
            method="POST"
    >
        @csrf
        @if(isset($book))
            @method('PUT')
        @endif
        {{--        @method(isset($book) ? 'PUT' : '')--}}
        <div class="col-8">
            <label for="title" class="form-label">Könyv címe</label>
            <input
                    type="text"
                    class="form-control @error('title')is-invalid @enderror"
                    name="title"
                    id="title"
                    value="{{ old('title', isset($book) ? $book->title : '') }}"
            >
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-8">
            <label for="category_id" class="form-label">Könyv címe</label>
            <select class="form-select  @error('category_id')is-invalid @enderror" name="category_id" id="category_id">
                <option value="">Nincs kategória</option>
                @foreach($bookCategories as $bookCategoryId => $bookCategoryTitle)
                    <option
                            value="{{ $bookCategoryId }}"
                            @if ($bookCategoryId === isset($book) ? $book->category_id : null) selected @endif
                    >{{ $bookCategoryTitle }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-8">
            <label for="author" class="form-label">`"Y'ró</label>
            <input
                    type="text"
                    class="form-control @error('author')is-invalid @enderror"
                    name="author"
                    id="author"
                    value="{{ old('author', isset($book) ? $book->author : '') }}"
            >
            @error('author')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-8">
            <label for="year" class="form-label">Év</label>
            <input
                    type="number"
                    min="0"
                    max="2100"
                    class="form-control @error('year')is-invalid @enderror"
                    name="year"
                    id="year"
                    value="{{ old('year', isset($book) ? $book->year : '') }}"
            >
            @error('year')
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
