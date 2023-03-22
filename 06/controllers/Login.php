<?php

use Models\User;

class Login
{

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = (new User())->findByEmail($_POST['email']);

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['email'] = $user['email'];

                header("Location: /");
                exit;
            }
        }

        view('login/create', [
            'title' => 'Login',
        ]);
    }

    public function logout()
    {
        session_destroy();

        header("Location: /");
        exit;
    }
}
