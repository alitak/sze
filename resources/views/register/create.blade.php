@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('register.store') }}">
        @csrf
        <div class="container mx-auto max-w-2xl mt-8">
            <div class="mt-4">
                <label for="name" class="block text-gray-800">Name</label>
                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded mt-2"
                       value="{{ old('name') }}">
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="email" class="block text-gray-800">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded mt-2"
                       value="{{ old('email')  }}">
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password" class="block text-gray-800">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full border border-gray-300 p-2 rounded mt-2">
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password_confirmation" class="block text-gray-800">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       class="w-full border border-gray-300 p-2 rounded mt-2">
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <button class="bg-blue-500 text-white p-2 rounded">Register</button>
            </div>
        </div>
    </form>
@endsection
