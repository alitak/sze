@extends('layouts.app')

@section('content')
    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="container mx-auto max-w-2xl mt-8">
            <div class="mt-4">
                <label for="email" class="block text-gray-800">Email</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded mt-2">
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <label for="password" class="block text-gray-800">Password</label>
                <input type="password" name="password" id="password"
                       class="w-full border border-gray-300 p-2 rounded mt-2">
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <button class="bg-blue-500 text-white p-2 rounded">Login</button>
            </div>
        </div>
    </form>
@endsection
