@extends('layouts.app')

@section('content')
    <ul>
        @foreach($albums as $album)
            <li>
                {{--                <a href="albums/{{ $album->id }}/show">--}}
                <a href="{{ route('albums.show', $album) }}">
                    {{ $album->title }}
                </a>
            </li>
        @endforeach
    </ul>

    {{ $albums->links() }}
@endsection
