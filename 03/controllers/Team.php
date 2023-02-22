<?php

class Team
{

    public function index()
    {
        $title = 'Team index';

        require 'views/team.view.php';
    }

    public function show()
    {
        $title = 'Team show';

        require 'views/team.view.php';
    }
}
