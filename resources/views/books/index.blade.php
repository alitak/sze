@extends('layouts.app')

@section('content')
    <div>
        <a class="btn btn-primary" href="{{ route('books.create') }}">Új könyv</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Cím</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>
                    {{ $book->id }}
                </td>
                <td>
                    <a class="text-decoration-none d-block" href="{{ route('books.show', $book->id) }}">
                        {{ $book->title }}
                    </a>
                </td>
                <td class="d-flex">
                    <form class="ms-auto btn-group" action="{{ route('books.destroy', $book->id) }}" method="POST">
                        <a class="btn btn-sm btn-secondary" href="{{ route('books.edit', $book->id) }}">
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
@endsection
