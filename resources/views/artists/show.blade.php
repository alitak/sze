@extends('layouts.app')

@section('content')
    <h2>{{ $artist->name }}</h2>

    <div class="mt-5">
        <a href="{{ route('artists.index') }}" class="text-blue-500">Artists</a>
    </div>
@endsection
