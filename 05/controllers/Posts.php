<?php
require 'models/Post.php';

class Posts
{

    public function index()
    {
        $title = 'Bejegyzések';

        $posts = (new Post())->all();

        require 'views/posts/index.view.php';
    }

    public function show(int $id)
    {
        $post = (new Post())->find($id);
        $title = $post['title'];

        require 'views/posts/show.view.php';
    }

    public function create()
    {
        $title = 'Bejegyzés létrehozása';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new Post())->create([
                'title' => $_POST['title'],
            ]);
        }

        require 'views/posts/create.view.php';
    }
}
