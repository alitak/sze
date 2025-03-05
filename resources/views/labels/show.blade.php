@extends('layouts.app')

@section('content')
    <h3>Artist: {{ $album->artist->name }}</h3>
    <p>
        {{ $album->year }} - {{ $album->label->name }}
    </p>
@endsection
