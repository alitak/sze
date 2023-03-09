<?php

class Dashboard
{

    public function index()
    {
        view('dashboard/index', [
            'title' => 'Dashboard index',
        ]);
    }
}
