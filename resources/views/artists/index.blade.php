@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        @foreach($artists as $artist)
            <div class="col-3 mb-3">
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
                        {{--                    <a href="{{ route('artists.show', $artist) }}" class="btn btn-primary">Details</a>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $artists->links() }}
@endsection
