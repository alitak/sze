<header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">LOGO</a>
        <nav>
            <ul class="flex space-x-6 text-gray-700 hover:text-gray-900">
                <li><a href="{{ route('albums.index') }}">Album list</a></li>
                <li><a href="{{ route('artists.index') }}">Artist list</a></li>
                <li><a href="{{ route('labels.index') }}">Label list</a></li>

                @guest
                    <li><a href="{{ route('login.create') }}">Login</a></li>
                    <li><a href="{{ route('register.create') }}">Register</a></li>
                @endguest

                @auth
                    <li>
                        <form action="{{ route('login.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Logout</button>
                        </form>
                    </li>
                @endauth

            </ul>
        </nav>
    </div>
</header>
