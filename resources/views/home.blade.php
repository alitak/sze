@extends('layouts.app')

@section('content')
    <p class="text-lg text-gray-700">
        Home lorem ipsum
    </p>

    @auth
        <p class="text-lg text-gray-700">
            You are logged in!
        </p>
    @endauth

    @guest
        <p class="text-lg text-gray-700">
            You are not logged in!
        </p>
    @endguest

@endsection
