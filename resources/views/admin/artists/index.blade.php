@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center">
        <h1 class="flex-grow-1">Artist list</h1>
        <a href="{{ route('admin.artists.create') }}" class="btn btn-primary">Add</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Artist</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($artists as $artist)
            <tr>
                <th scope="row">{{ $artist->id }}</th>
                <td>{{ $artist->name }}</td>
                <td class="d-flex justify-content-end">
                    <a href="{{ route('admin.artists.show', $artist) }}" class="btn btn-secondary">Show</a>
                    <a href="{{ route('admin.artists.edit', $artist) }}" class="btn btn-primary mx-3">Edit</a>
                    <form action="{{ route('admin.artists.destroy', $artist) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $artists->links() }}
@endsection
