<?php
require base_path('models/Team.php');

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
