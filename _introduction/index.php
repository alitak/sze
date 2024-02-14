<?php

include('functions.php');

$books = [
    [
        'name'   => 'Hyperion',
        'author' => 'Dan Simmons',
        'year'   => 1989,
    ],
    [
        'name'   => 'Az utolsó kívánság',
        'author' => 'Andrzej Sapkowski',
        'year'   => 1993,
    ],
    [
        'name'   => 'Alapítvány',
        'author' => 'Isaac Asimov',
        'year'   => 1951,
    ],
];

//    foreach (books_filter($books, fn ($book) => $book['author'] == 'Dan Simmons') as $book) {
//        echo '<li>' . $book['name'] . ' (' . $book['author'] . ')</li>';
//    }

dd($books);

$booksToOutput = array_filter($books, fn (array $book): bool => $book['author'] == 'Dan Simmons');

include('index.view.php');
//require('index.view.php');
