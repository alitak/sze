<ul>
    @foreach ($books as $book)
        <li>{{ $book->title }}</li>
    @endforeach
</ul>
