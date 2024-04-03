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
            <form action="" method="GET">
                <th></th>
                <th>
                    <input type="text" name="title" class="form-control" value="{{ request()->title }}">
                </th>
                <th>
                    <select class="form-select" name="category" aria-label="Default select example">
                        <option value="">Open this select menu</option>
                        @foreach($categories as $id => $title)
                            {{--                            <option value="{{ $id }}" @if (request()->category == $id) selected @endif>{{ $title }}</option>--}}
                            <option value="{{ $id }}" {{ request()->category == $id ? 'selected' : '' }}>{{ $title }}</option>
                        @endforeach
                    </select>
                </th>
                <th>
                    <input type="text" name="author" class="form-control">
                </th>
                <th>
                    <div class="d-flex">
                        <input type="number" name="year[from]" class="form-control" style="width: 75px" value="{{ request()->year['from'] }}"> -
                        <input type="number" name="year[to]" class="form-control" style="width: 75px" value="{{ request()->year['to'] }}">
                    </div>
                </th>
                <th>
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Keresés</button>
                </th>
            </form>
        </tr>
        <tr>
            <th>#</th>
            <th style="width: 100%">Cím</th>
            <th>Kategória</th>
            <th>Író</th>
            <th>Év</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
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
                <td class="text-nowrap">{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td class="">
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
        @empty
            <tr>
                <td colspan="6">
                    Nincs találat
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $books->links() }}
@endsection
