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
