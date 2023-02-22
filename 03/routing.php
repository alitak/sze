<?php

function abort(int $statusCode = 404)
{
    http_response_code($statusCode);
    require 'views/errors/'.$statusCode.'.view.php';

    exit;
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routing = [
    '/03/' => 'controllers/dashboard.php',
    '/03/team' => 'controllers/team.php',
    '/03/projects' => 'controllers/projects.php',
];

if (array_key_exists($uri, $routing)) {
    require $routing[$uri];
} else {
    abort();
}
