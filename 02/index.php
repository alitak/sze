<?php
$books = [
    [
        'name' => 'Hyperion',
        'author' => 'Dan Simmons',
        'year' => 1989,
    ],
    [
        'name' => 'Az utolsó kívánság',
        'author' => 'Andrzej Sapkowski',
        'year' => 1993,
    ],
    [
        'name' => 'Alapítvány',
        'author' => 'Isaac Asimov',
        'year' => 1951,
    ],
];
$filteredData = array_filter($books, fn (array $book): bool => $book['year'] < 1990);

require('index.view.php');
