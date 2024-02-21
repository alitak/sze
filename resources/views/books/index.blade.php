<div>
    <a href="{{ route('books.create') }}">Új könyv</a>
</div>

@if (session('success'))
    <div style="border: 3px solid #00FF00; padding: 5px;">
        {{ session('success') }}
    </div>
@endif

<ul>
    @foreach ($books as $book)
        <li>
            <a href="{{ route('books.show', $book->id) }}">
                {{ $book->title }}
            </a>
        </li>
    @endforeach
</ul>
