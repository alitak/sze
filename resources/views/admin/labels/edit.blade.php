@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Edit label') }}: {{ $label->name }}</div>

            <div class="card-body">
                <form enctype="multipart/form-data"
                      method="POST" action="{{ route('admin.labels.update', $label) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name', $label->name) }}" autocomplete="name"
                                   autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-md-4 col-form-label text-md-end">Cover</label>
                        <div class="col-md-6">
                            <input name="image" class="form-control" type="file" id="image">

                            @if ($label->image)
                                <img src="{{ $label->image_url  }}" alt="{{ $label->name }}">
                            @endif
                        </div>


                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Modify') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
