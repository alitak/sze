@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center">
        <h1 class="flex-grow-1">Label list</h1>
        <a href="{{ route('admin.labels.create') }}" class="btn btn-primary">Add</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Label</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($labels as $label)
            <tr>
                <th scope="row">{{ $label->id }}</th>
                <td>{{ $label->name }}</td>
                <td class="d-flex justify-content-end">
                    <a href="{{ route('admin.labels.show', $label) }}" class="btn btn-secondary">Show</a>
                    <a href="{{ route('admin.labels.edit', $label) }}" class="btn btn-primary mx-3">Edit</a>
                    <form action="{{ route('admin.labels.destroy', $label) }}" method="POST" class="d-inline"
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

    {{ $labels->links() }}
@endsection
