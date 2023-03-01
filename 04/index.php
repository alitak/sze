<?php

require 'functions.php';
//require 'routing.php';

$dsn = 'mysql:host=mysql-local;port=3306;dbname=sze;charset=utf8mb4';
$pdo = new PDO($dsn, 'root', 'a');

$statement = $pdo->prepare('select * from posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

//foreach($posts as $post) {
//    echo '<li>'.$post['title'].'</li>';
//}

dd($posts);
