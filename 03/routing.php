<?php

function abort(int $statusCode = 404)
{
    http_response_code($statusCode);
    require 'views/errors/'.$statusCode.'.view.php';

    exit;
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//$uri = trim($uri, '/');
//$uri = str_replace('/', '', $uri);
//$uri = str_replace('show', 'foo', $uri);
//$uri = substr($uri, 4);
dd($uri);

$routing = [
    '/' => 'controllers/dashboard.php',
    '/team' => 'controllers/team.php',
    '/projects' => 'controllers/projects.php',
];

if (array_key_exists($uri, $routing)) {
    require $routing[$uri];
} else {
    abort();
}
