<ul>
    @foreach ($books as $book)
        <li>
            <a href="books/{{ $book->id }}/show">
                {{ $book->title }}
            </a>
        </li>
    @endforeach
</ul>
