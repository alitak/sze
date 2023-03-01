<?php

require 'functions.php';

//require 'routing.php';

class Database
{
    public function query(string $param)
    {
        $dsn = 'mysql:host=mysql-local;port=3306;dbname=sze;charset=utf8mb4';
        $pdo = new PDO($dsn, 'root', 'a');

        $statement = $pdo->prepare($param);
        $statement->execute();

        return $statement;
    }
}

$db = new Database();
$posts = $db
    ->query('select * from posts')
    ->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
foreach ($posts as $post) {
    echo '<li>'.$post['title'].'</li>';
}

//dd($posts);
