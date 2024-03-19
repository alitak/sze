<div class="bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}">Könyvek</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.book-categories.index') }}">Kategóriák</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.create') }}">Regisztráció</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.create') }}">Belépés</a>
                            </li>
                        @endguest

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    {{ auth()->user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="nav-link">Kilépés</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                    {{--            <form class="d-flex" role="search">--}}
                    {{--                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
                    {{--                <button class="btn btn-outline-success" type="submit">Search</button>--}}
                    {{--            </form>--}}
                </div>
            </div>
        </nav>
    </div>
</div>
