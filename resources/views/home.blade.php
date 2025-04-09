@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <h3>Albums</h3>
        @foreach($albums as $album)
            <div class="col-4 mb-3">
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mb-3">
        <h3>Artists</h3>
        @foreach($artists as $artist)
            <div class="col-4 mb-3">
                <div class="card">
                    <a href="{{ route('artists.show', $artist) }}">
                        <img src="{{ $artist->image_url }}" class="card-img-top" alt="{{ $artist->name }}"
                             style="height: 160px; object-fit: cover;"
                        >
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('artists.show', $artist) }}" class="text-decoration-none">
                                {{ $artist->name }} ({{ $artist->albums_count }})
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mb-3">
        <h3>Labels</h3>
        @foreach($labels as $label)
            <div class="col-4">
                <div class="card">
                    <a href="{{ route('labels.show', $label) }}">
                        <img src="{{ $label->image_url }}" class="card-img-top" alt="{{ $label->name }}"
                             style="height: 160px; object-fit: cover;"
                        >
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('labels.show', $label) }}" class="text-decoration-none">
                                {{ $label->name }} ({{ $label->albums_count }})
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
