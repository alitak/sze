<?php

function abort(int $statusCode = 404)
{
    http_response_code($statusCode);
    require 'views/errors/'.$statusCode.'.view.php';

    exit;
}

// uri kinyerése, tömbbé alakítása
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$uri = trim($uri, '/');
$uri = explode('/', $uri);

// Alapértelmezett kontroller beállítása
//if ('' === $uri[0]) {
//    $uri[0] = 'Dashboard';
//}
$uri[0] = ('' === $uri[0]) ? 'Dashboard' : $uri[0];
if (! is_file('controllers/'.$uri[0].'.php')) {
    abort();
}

// alapértelmezett method beállítása
$uri[1] = ('' === $uri[1]) ? 'index' : $uri[1];
if (! method_exists('controllers/'.$uri[0].'.php', $uri[1])) {
    abort();
}

// controller betöltése
require 'controllers/'.$uri[0].'.php';

// controller példányosítása
//$controller = new Team();
//$controller = new Dashboard();
$controller = new $uri[0]();

// metódus meghívása
//$controller->index();
$controller->{$uri[1]}();
