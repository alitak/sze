<?php

use Models\Team;

class Teams
{

    public function index()
    {
        view('teams/index', [
            'title' => 'Team index',
            'teams' => (new Team())->all(),
        ]);
    }
}