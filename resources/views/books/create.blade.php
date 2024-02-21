<h1>Új könyv</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Cím</label>
        <input type="text"
               name="title" id="title"
        >
    </div>

    <button type="submit">Mentés</button>
</form>
