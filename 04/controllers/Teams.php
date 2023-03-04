<?php

class Teams
{

    public function index()
    {
        $title = 'Team index';

        require 'models/Team.php';
        $teams = (new Team())->all();

        require 'views/team.view.php';
    }

    public function show()
    {
        $title = 'Team show';

        require 'views/team.view.php';
    }
}
