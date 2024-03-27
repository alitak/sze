@extends('layouts.app')

@section('content')
    <div>
        <a class="btn btn-primary" href="{{ route('admin.books.create') }}">Új könyv</a>
        <a class="btn btn-secondary" href="{{ route('admin.import-books.index') }}">Importálás</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Cím</th>
            <th>Kategória</th>
            <th>Író</th>
            <th>Év</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>
                    <a class="text-decoration-none d-block" href="{{ route('admin.books.show', $book->id) }}">
                        {{ $book->title }}
                    </a>
                </td>
                <td>
                    {{ $book->category?->title ?? '-'}}
                </td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td class="d-flex">
                    <form class="ms-auto btn-group" action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.books.edit', $book->id) }}">
                            MOD
                        </a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">DEL</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $books->links() }}
@endsection
