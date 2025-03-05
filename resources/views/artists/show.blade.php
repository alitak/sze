@extends('layouts.app')

@section('content')
    <h2>{{ $artist->name }}</h2>

    <div>
        <h3>Albums</h3>
        <ul>
            @foreach($artist->albums as $album)
                <li>
                    <a href="{{ route('albums.show', $album) }}">
                        {{ $album->title }} ({{ $album->year }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-5">
        <a href="{{ route('artists.index') }}" class="text-blue-500">Artists</a>
    </div>
@endsection
