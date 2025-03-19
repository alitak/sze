@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Password change') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('settings.password-change') }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for=old_password"
                               class="col-md-4 col-form-label text-md-end">{{ __('Old password') }}</label>

                        <div class="col-md-6">
                            <input id=old_password" type="password"
                                   class="form-control @error('old_password') is-invalid @enderror"
                                   name=old_password" required>

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Change') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
