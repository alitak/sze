@extends('layouts.app')

@section('content')
    <ul>
        @foreach($labels as $label)
            <li>
                <a href="{{ route('labels.show', $label) }}">
                    {{ $label->name }} ({{ $label->albums_count }})
                </a>
            </li>
        @endforeach
    </ul>

{{--    {{ $label->links() }}--}}
@endsection
