@extends('layouts.app')

@section('content')
    <h2>{{ $album->title }}</h2>
    <h3>{{ $album->artist }}</h3>
    <p>
        {{ $album->year }} - {{ $album->label }}
    </p>
@endsection
