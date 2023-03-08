<?php
require 'models/Post.php';
require 'Validator.php';

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
        $title = htmlspecialchars($post['title']);

        require 'views/posts/show.view.php';
    }

    public function create()
    {
        $title = 'Bejegyzés létrehozása';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['title'] = trim($_POST['title']);

            if (Validator::isEmpty($_POST['title'])) {
                $errors = 'A bejegyzés címe nem lehet üres!';
            }
            if (strlen($_POST['title']) > 200) {
                $errors = 'A bejegyzés legfeljebb 200 karakter lehet!';
            }

            if (!isset($errors)) {
                (new Post())->create([
                    'title' => $_POST['title'],
                ]);

                $message = 'Sikeres mentés';
            }
        }

        require 'views/posts/create.view.php';
    }
}
