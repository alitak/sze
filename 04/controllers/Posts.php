<?php

class Posts
{

    public function index()
    {
        $title = 'Posts index';

        require 'Database.php';
        $config = require 'config.php';

        $db = new Database($config['database']);

        $query = 'select * from posts';
        $posts = $db
            ->query($query)
            ->fetchAll();

        require 'views/post.view.php';
    }

    public function show()
    {
        $title = 'Post show';

        require 'views/post.view.php';
    }
}
