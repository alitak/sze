@extends('layouts.app')

@section('content')
    <h2>Új könyv</h2>

    <form class="row" action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="col-8">
            <label for="title" class="form-label">Könyv címe</label>
            <input
                type="text"
                class="form-control @error('title')is-invalid @enderror"
                name="title"
                id="title"
                value="{{ old('title') }}"
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
