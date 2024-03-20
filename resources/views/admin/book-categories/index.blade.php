@extends('layouts.app')

@section('content')
    <div>
        <a class="btn btn-primary" href="{{ route('admin.book-categories.create') }}">Új kategória</a>
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
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($bookCategories as $bookCategory)
            <tr>
                <td>{{ $bookCategory->id }}</td>
                <td>
                    <a class="text-decoration-none d-block" href="{{ route('admin.book-categories.show', $bookCategory->id) }}">
                        {{ $bookCategory->title }}
                    </a>
                </td>
                <td class="d-flex">
                    <form class="ms-auto btn-group" action="{{ route('admin.book-categories.destroy', $bookCategory->id) }}" method="POST">
                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.book-categories.edit', $bookCategory->id) }}">
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
