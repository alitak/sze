@extends('layouts.app')

@section('content')
    <h2 class="">
        @if(isset($bookCategory))
            Kategória szerkesztése:
            <span class="text-secondary">{{ $bookCategory->title }}</span>
        @else
            Új kategória
        @endif
    </h2>

    <form
        class="row"
        action="{{ isset($bookCategory) ? route('admin.book-categories.update', $bookCategory->id) : route('admin.book-categories.store') }}"
        method="POST"
    >
        @csrf
        @if(isset($bookCategory))
            @method('PUT')
        @endif
        {{--        @method(isset($bookCategory) ? 'PUT' : '')--}}
        <div class="col-8">
            <label for="title" class="form-label">Kategória címe</label>
            <input
                type="text"
                class="form-control @error('title')is-invalid @enderror"
                name="title"
                id="title"
                value="{{ old('title', isset($bookCategory) ? $bookCategory->title : '') }}"
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
