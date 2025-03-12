@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="bg-green-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('success') }}
        </div>
    @endif

    <p class="text-lg text-gray-700">
        Home lorem ipsum
    </p>
@endsection
