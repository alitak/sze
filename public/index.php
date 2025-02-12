<?php

if ($_SERVER['REQUEST_URI'] == '/') {
    include('../controllers/album.php');
} elseif ($_SERVER['REQUEST_URI'] == '/show') {
    include('../controllers/show.php');
} else {
    http_response_code(404);
    echo '404 Not Found';
    exit;
}
