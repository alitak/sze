<header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">LOGO</a>
        <nav>
            <ul class="flex space-x-6">
                <li><a href="{{ route('albums.index') }}" class="text-gray-700 hover:text-gray-900">Album list</a></li>
                <li><a href="{{ route('artists.index') }}" class="text-gray-700 hover:text-gray-900">Artist list</a></li>
                <li><a href="{{ route('labels.index') }}" class="text-gray-700 hover:text-gray-900">Label list</a></li>

                <li><a href="{{ route('register.create') }}" class="text-gray-700 hover:text-gray-900">Register</a></li>
            </ul>
        </nav>
    </div>
</header>
