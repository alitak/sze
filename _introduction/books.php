<?php
require('functions.php');

$config = require 'config.php';

$db = new PDO(
    $config['database']['dsn'],
    $config['database']['user'],
    $config['database']['password'],
);

$statement = $db->prepare('SELECT * FROM books');
$statement->execute();

$booksToOutput = $statement->fetchAll(PDO::FETCH_ASSOC);

include('index.view.php');

//$mysqli = mysqli_connect(
////    'mysql-local-vizsga',
//    'localhost',
//    'root',
//    'a',
//    'php',
//);
//
////dd($mysqli);
//
//$result = mysqli_query($mysqli, 'SELECT * FROM BOOKS');
//
//foreach (mysqli_fetch_assoc($result) as $book) {
//
//}
