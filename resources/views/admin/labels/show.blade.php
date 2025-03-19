@extends('layouts.app')

@section('content')
    <h1 class="flex-grow-1">{{ $label->name }}</h1>

    <a href="{{ route('admin.labels.index') }}" class="btn btn-primary">back</a>
@endsection
