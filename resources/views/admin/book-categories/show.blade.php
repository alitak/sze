@extends('layouts.app')

@section('content')
    <h2 class="">
        #{{ $bookCategory->id }} <br>
        {{ $bookCategory->title }} <br>

        <ul>
            @foreach($bookCategory->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
    </h2>
@endsection
