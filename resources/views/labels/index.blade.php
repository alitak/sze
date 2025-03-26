@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        @foreach($labels as $label)
            <div class="col-3">
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
                        {{--                    <a href="{{ route('labels.show', $label) }}" class="btn btn-primary">Details</a>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $labels->links() }}
@endsection
