<?php
require 'models/Post.php';

class Posts
{

    public function index()
    {
        $title = 'Posts index';

        $posts = (new Post())->all();

        require 'views/posts/index.view.php';
    }

    public function show()
    {
        $id = $_GET['id'];

        $post = (new Post())->find($id);
        $title = $post['title'];

        require 'views/posts/show.view.php';
    }
}
