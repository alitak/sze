@extends('layouts.app')

@section('content')
    <h2 class=""> Regisztráció </h2>

    <form class="row" action="{{ route('register.store') }}" method="POST">
        @csrf
        <div class="col-8">
            <label for="name" class="form-label">Név</label>
            <input
                    type="text"
                    class="form-control @error('name')is-invalid @enderror"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
            >
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-8">
            <label for="email" class="form-label">Email</label>
            <input
                    type="email"
                    class="form-control @error('email')is-invalid @enderror"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
            >
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-8">
            <label for="password" class="form-label">Jelszó</label>
            <input
                    type="password"
                    class="form-control @error('password')is-invalid @enderror"
                    name="password"
                    id="password"
                    value="{{ old('password') }}"
            >
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-8">
            <label for="password_confirmation" class="form-label">Jelszó megerősítése</label>
            <input
                    type="password"
                    class="form-control @error('password_confirmation')is-invalid @enderror"
                    name="password_confirmation"
                    id="password_confirmation"
                    value="{{ old('password_confirmation') }}"
            >
            @error('password_confirmation')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-12 mt-3">
            <button class="btn btn-primary" type="submit">Regisztráció</button>
        </div>
    </form>
@endsection
