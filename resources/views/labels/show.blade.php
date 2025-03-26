@extends('layouts.app')

@section('content')
    <h3>Label: {{ $label->name }}</h3>

    <div>
        @foreach ($albums as $album)
            <div class="card col" style="width: 18rem;">
{{--                <a href="{{ route('labels.show', $label) }}">--}}
{{--                    <img src="{{ $label->image_url }}" class="card-img-top" alt="{{ $label->name }}">--}}
{{--                </a>--}}
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('albums.show', $album) }}" class="text-decoration-none">
                            {{ $album->title }}
                        </a>
                    </h5>
                    {{--                    <a href="{{ route('labels.show', $label) }}" class="btn btn-primary">Details</a>--}}
                </div>
            </div>
        @endforeach
    </div>

    {{ $albums->links() }}

@endsection
