<?php

use Models\User;

class Register
{

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            (new User())->create([
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            ]);

            $message = 'Sikeres regisztráció';

            $_SESSION['email'] = $_POST['email'];

            header("Location: /");
            exit;
        }

        view('register/create', [
            'title' => 'Regisztráció',
        ]);
    }
}
