@extends('layouts.app')

@section('content')
    <h2 class="">Belépés</h2>

    <form class="row" action="{{ route('login.store') }}" method="POST">
        @csrf
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

        <div class="col-12 mt-3">
            <button class="btn btn-primary" type="submit">Belépés</button>
        </div>
    </form>
@endsection
