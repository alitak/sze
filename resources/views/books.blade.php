<ul>
    @foreach ($books as $book)
        <li>
            <a href="{{ $book->id }}/show">
                {{ $book->title }}
            </a>
        </li>
    @endforeach
</ul>
