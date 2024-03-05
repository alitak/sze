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
                            <a class="nav-link" href="{{ route('book-categories.index') }}">Kategóriák</a>
                        </li>
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
