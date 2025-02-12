<?php

include('../controllers/HomeController.php');
include('../controllers/AlbumController.php');
include('../controllers/ProjectController.php');

$url = trim($_SERVER['REQUEST_URI'], '/');
$urlArray = explode('/', $url);

if ($urlArray[0] == '') {
    $urlArray[0] = 'home';
}

$urlArray[1] = $urlArray[1] ?? 'index';

$className = ucfirst($urlArray[0]) . 'Controller';
if (! class_exists($className) || ! method_exists($className, $urlArray[1])) {
    http_response_code(404);
    echo '404 Not Found';
    exit;
}

(new $className())->{$urlArray[1]}();
