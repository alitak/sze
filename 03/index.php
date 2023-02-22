<?php

require 'functions.php';

$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/03/') {
    require 'controllers/dashboard.php';
} elseif ($uri === '/03/team') {
    require 'controllers/team.php';
} elseif ($uri === '/03/projects') {
    require 'controllers/projects.php';
}
