<h1>Új könyv</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Cím</label>
        <input type="text"
               name="title" id="title"
               value="{{ old('title') }}"
               style="@error('title') border: 1px solid #FF0000; @enderror"
        >
        @error('title')
            <div style="color: #FF0000;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Mentés</button>
</form>
