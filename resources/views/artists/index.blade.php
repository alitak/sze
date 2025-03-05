@extends('layouts.app')

@section('content')
    <ul>
        @foreach($artists as $artist)
            <li><a href="artists/{{ $artist->id }}/show">{{ $artist->name }}</a></li>
        @endforeach
    </ul>
@endsection
