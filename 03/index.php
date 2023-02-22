<?php

$title = 'Dashboard';

function dd($param): void
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    die();
}

function isUri(string $uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

//if ($_SERVER['REQUEST_URI'] === '/03/') {
//    echo 'bg-red-900 text-white';
//} else {
//    echo 'text-gray-300 hover:bg-gray-700 hover:text-white';
//}
//echo $_SERVER['REQUEST_URI'] === '/03/' ? 'bg-red-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white';

require 'views/index.view.php';
