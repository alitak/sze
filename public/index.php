<?php

declare(strict_types=1);

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
//
//for ($i = 0 ; $i < count($books); $i++) {
//    echo $books[$i]['name'] . ' (' . $books[$i]['author'] . '): ' . $books[$i]['year'] . PHP_EOL;
//}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books</title>
</head>
<body>
<table style="width: 100%">
    <thead>
    <tr>
        <th>Name</th>
        <th>Author</th>
        <th>Year</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($books as $book) {
        echo '<tr>' . PHP_EOL;
        echo '<td style="border: 1px solid #ff0000">' . $book['name'] . '</td>' . PHP_EOL;
        echo '<td style="border: 1px solid #ff0000">' . $book['author'] . '</td>' . PHP_EOL;
        echo '<td style="border: 1px solid #ff0000">' . $book['year'] . '</td>' . PHP_EOL;
        echo '</tr>' . PHP_EOL;
    }
    ?>
    </tbody>
</table>
<ul>
    <?php
    foreach ($books as $book) {
        echo '<li>' . $book['name'] . ' (' . $book['author'] . '): ' . $book['year'] . '</li>' . PHP_EOL;
    }
    ?>
</ul>
</body>
</html>
