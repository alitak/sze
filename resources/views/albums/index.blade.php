@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        @foreach($albums as $album)
            <div class="col-3 mb-3">
                <div class="card">
                    <a href="{{ route('albums.show', $album) }}">
                        <img src="{{ $album->image_url }}" class="card-img-top" alt="{{ $album->title }}"
                             style="height: 160px; object-fit: cover;"
                        >
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('albums.show', $album) }}" class="text-decoration-none">
                                {{ $album->title }}
                            </a>
                        </h5>
                        <p class="card-text">
                            {{ $album->artist->name }} ({{ $album->year }}) <br>
                        {{ $album->duration_for_humans }}
                        {{--                    <a href="{{ route('albums.show', $album) }}" class="btn btn-primary">Details</a>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $albums->links() }}
@endsection
