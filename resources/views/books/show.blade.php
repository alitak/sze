@extends('layouts.app')

@section('content')
    <h2 class="">
        #{{ $book->id }} <br>
        {{ $book->title }} <br>
        {{ $book->category->title }}
    </h2>
@endsection
