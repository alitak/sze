<?php

class Dashboard
{

    public function index()
    {
        $title = 'Dashboard index';

        require 'views/dashboard.view.php';
    }

    public function show()
    {
        $title = 'Dashboard show';

        require 'views/dashboard.view.php';
    }
}
