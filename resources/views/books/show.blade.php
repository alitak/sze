@extends('layouts.app')

@section('content')
    <h2 class="">
        #{{ $book->id }} <br>
        {{ $book->title }}
    </h2>
@endsection
