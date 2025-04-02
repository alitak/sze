@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Edit album') }}: {{ $album->name }}</div>

            <div class="card-body">
                <form enctype="multipart/form-data"
                      method="POST" action="{{ route('admin.albums.update', $album) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" value="{{ old('title', $album->title) }}" autocomplete="title"
                                   autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="artist" class="col-md-4 col-form-label text-md-end">{{ __('Artist') }}</label>

                        <div class="col-md-6">
                            <select name="artist_id" id="artist_id" class="form-select @error('artist_id') is-invalid @enderror">
                                <option value="">Select artist</option>
                                @foreach($artists as $id => $artist)
                                    <option value="{{ $id }}" {{ $id == old('artist_id', $album->artist_id) ? 'selected' : '' }}>{{ $artist }}</option>
                                @endforeach
                            </select>

                            @error('artist')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="label_id" class="col-md-4 col-form-label text-md-end">{{ __('Label') }}</label>

                        <div class="col-md-6">
                            <select name="label_id" id="label_id" class="form-select @error('label_id') is-invalid @enderror">
                                <option value="">Select label</option>
                                @foreach($labels as $id => $label)
                                    <option value="{{ $id }}" {{ $id == old('label_id', $album->label_id) ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>

                            @error('label_id')
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

                            @if ($album->image)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="removeImage"
                                           id="removeImage">
                                    <label class="form-check-label" for="removeImage">
                                        Remove image
                                    </label>
                                </div>

                                <img src="{{ $album->image_url  }}" alt="{{ $album->name }}">
                            @endif
                        </div>

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>

                        <div class="col-md-6">
                            <input id="year" type="number" class="form-control @error('year') is-invalid @enderror"
                                   name="year" value="{{ old('year', $album->year) }}" autocomplete="year"
                                   autofocus>

                            @error('year')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="duration" class="col-md-4 col-form-label text-md-end">{{ __('Duration') }}</label>

                        <div class="col-md-6">
                            <input id="duration" type="number" class="form-control @error('duration') is-invalid @enderror"
                                   name="duration" value="{{ old('duration', $album->duration) }}" autocomplete="duration"
                                   autofocus>

                            @error('duration')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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
