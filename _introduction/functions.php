<?php

function dd(mixed $var): void
{
    echo '..::DEBUGGING::..';
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

function books_filter(array $books_input, callable $fnc): array
{
    $books = [];
    foreach ($books_input as $book) {
        if ($fnc($book)) {
            $books[] = $book;
        }
    }

    return $books;
}
