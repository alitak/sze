<h1>Könyv szerkesztése: {{ $book->title }}</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Cím</label>
        <input type="text"
               name="title" id="title"
               value="{{ old('title', $book->title) }}"
               style="@error('title') border: 1px solid #FF0000; @enderror"
        >
        @error('title')
        <div style="color: #FF0000;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Mentés</button>
</form>
