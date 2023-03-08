<?php

class Projects
{

    public function index()
    {
        $title = 'Projects index';

        require 'views/projects.view.php';
    }

    public function show()
    {
        $title = 'Projects show';

        require 'views/projects.view.php';
    }
}
