<?php

use Models\Post;

class Posts
{

    public function index()
    {
        view('posts/index', [
            'title' => 'Bejegyzések',
            'posts' => (new Post())->all(),
        ]);
    }

    public function show(int $id)
    {
        $post = (new Post())->find($id);

        view('posts/show', [
            'title' => htmlspecialchars($post['title']),
            'post' => $post,
        ]);
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

        require base_path('views/posts/create.view.php');
    }
}
