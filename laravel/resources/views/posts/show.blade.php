@extends('layouts.app')

@section('content')
    <h1>
        {{ $post->title }}
    </h1>

    <h3>
        {{ $post->user->name }}
    </h3>
@endsection
