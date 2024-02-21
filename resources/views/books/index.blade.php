<div>
    <a href="{{ route('books.create') }}">Új könyv</a>
</div>

<ul>
    @foreach ($books as $book)
        <li>
            <a href="{{ route('books.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </li>
    @endforeach
</ul>
