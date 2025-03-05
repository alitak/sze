@extends('layouts.app')

@section('content')
    <ul>
        @foreach($artists as $artist)
            <li><a href="{{ route('artists.show', $artist) }}">{{ $artist->name }}</a></li>
        @endforeach
    </ul>
@endsection
