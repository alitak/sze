@extends('layouts.app')

@section('content')

    <ul class="list-group">
        @foreach($albums as $album)
            <li class="list-group-item">
                {{--                <a href="albums/{{ $album->id }}/show">--}}
                <a href="{{ route('albums.show', $album) }}">
                    {{ $album->title }} ({{ $album->artist->name }} - {{ $album->label->name }})
                </a>
            </li>
        @endforeach
    </ul>
    {{--    {{ $albums->links() }}--}}
@endsection
