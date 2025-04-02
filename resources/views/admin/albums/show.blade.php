@extends('layouts.app')

@section('content')
    <h1 class="flex-grow-1">{{ $album->title }}</h1>

    <a href="{{ route('admin.artists.index') }}" class="btn btn-primary">back</a>
@endsection
