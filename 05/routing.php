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
$uri[0] = ucfirst(('' === $uri[0]) ? 'Dashboard' : $uri[0]);
if (! is_file('controllers/'.$uri[0].'.php')) {
    abort();
}

// controller betöltése
require 'controllers/'.$uri[0].'.php';
// controller példányosítása
//$controller = new Team();
//$controller = new Dashboard();
$controller = new $uri[0]();

// alapértelmezett method beállítása
$uri[1] = (array_key_exists(1, $uri) && '' !== $uri[1]) ? $uri[1] : 'index';

if (! method_exists($controller, $uri[1])) {
    abort();
}

// metódus meghívása
call_user_func_array([$controller, $uri[1]], array_slice($uri, 2));
