@extends('layouts.app')

@section('content')
    <h2 class="">
        #{{ $bookCategory->id }} <br>
        {{ $bookCategory->title }}
    </h2>
@endsection
