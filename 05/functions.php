<?php

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

function abort(int $statusCode = 404): void
{
    http_response_code($statusCode);
    require 'views/errors/'.$statusCode.'.view.php';

    exit;
}

function base_path(string $path): string
{
    return BASE_PATH.$path;
}

function view(string $view, array $params)
{
    extract($params);

    require base_path('views/'.$view.'.view.php');
}
