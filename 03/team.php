<?php

$title = 'Team';

function dd($param): void
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
    die();
}

require 'views/team.view.php';
