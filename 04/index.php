<?php

require 'functions.php';
//require 'routing.php';
require 'Database.php';
//dd('select * from posts where id='.$_GET['id']);
$config = require 'config.php';

$db = new Database($config['database']);
$query = 'select * from posts where id = :id';
var_dump($query);
$posts = $db
    ->query($query)
    ->fetchAll();

dd($posts);
foreach ($posts as $post) {
    echo '<li>'.$post['title'].'</li>';
}

//dd($posts);
