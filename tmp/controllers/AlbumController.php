<?php

declare(strict_types=1);

class AlbumController
{
    public string $foo = 'bar';

    public function index()
    {
        $albums = include '../models/albums.php';

        include '../views/albums_index.view.php';
    }

    public function show()
    {
        include '../views/albums_show.view.php';
    }
}
