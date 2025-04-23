@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center">
        <h1 class="flex-grow-1">Album list</h1>
        <a href="{{ route('admin.albums.create') }}" class="btn btn-primary">Add</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <form action="">
            <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">
                    <input class="form-control bg-white" type="text" name="title" placeholder="name"
                           value="{{ $search['title'] }}">
                </th>
                <th scope="col">
                    <select name="artist_id" id="artist_id" class="form-select @error('artist') is-invalid @enderror">
                        <option value="">Select artist</option>
                        @foreach($artists as $id => $artist)
                            <option
                                value="{{ $id }}" {{ $id == $search['artist_id'] ? 'selected' : '' }}>{{ $artist }}</option>
                        @endforeach
                    </select>
                </th>
                <th scope="col">
                    <select name="label_id" id="label_id" class="form-select @error('label_id') is-invalid @enderror">
                        <option value="">Select label</option>
                        @foreach($labels as $id => $label)
                            <option value="{{ $id }}" {{ $id == $search['label_id'] ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </th>
                <th scope="col">
                    <input class="form-control bg-white" type="number" name="year" placeholder="year"
                           value="{{ $search['year'] }}">
                </th>
                <th scope="col">
                    <input class="form-control bg-white" type="number" name="duration" placeholder="duration">
                </th>
                <th scope="col">
                    <button class="btn btn-secondary" type="submit">Search</button>
                </th>
            </tr>
        </form>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Artist</th>
            <th scope="col">Label</th>
            <th scope="col">Year</th>
            <th scope="col">Duration</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($albums as $album)
            <tr>
                <th scope="row">{{ $album->id }}</th>
                <td>{{ $album->title }}</td>
                <td>{{ $album->artist->name }}</td>
                <td>{{ $album->label?->name }}</td>
                <td>{{ $album->year }}</td>
                {{--                <td>{{ (int)($album->duration / 60) }}:{{ $album->duration % 60 }}</td>--}}
                {{--                <td>{{ floor($album->duration / 60) }}:{{ $album->duration % 60 }}</td>--}}
                <td>{{ $album->duration_for_humans  }}</td>
                <td class="d-flex justify-content-end">
                    <a href="{{ route('admin.albums.show', $album) }}" class="btn btn-secondary">Show</a>
                    <a href="{{ route('admin.albums.edit', $album) }}" class="btn btn-primary mx-3">Edit</a>
                    <form action="{{ route('admin.albums.destroy', $album) }}" method="POST" class="d-inline"
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

    {{ $albums->links() }}
@endsection
