@extends('layouts.app')

@section('content')
    <h3>Label: {{ $label->name }}</h3>

    <div>
        @foreach ($albums as $album)
            <p>{{ $album->title }}</p>
        @endforeach
    </div>

    {{ $albums->links() }}

@endsection
