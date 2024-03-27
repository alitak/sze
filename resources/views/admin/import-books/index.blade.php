@extends('layouts.app')

@section('content')
    <h2 class="">
        Könyvek importálása
    </h2>

    <form
        class="row"
        action="{{ route('admin.import-books.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="col-8">
            <label for="csv" class="form-label">CSV fájl</label>
            <input
                type="file"
                class="form-control @error('csv')is-invalid @enderror"
                name="csv"
                id="csv"
                value="{{ old('csv', isset($book) ? $book->csv : '') }}"
            >
            @error('csv')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-12 mt-3">
            <button class="btn btn-primary" type="submit">Importálás</button>
        </div>
    </form>
@endsection
