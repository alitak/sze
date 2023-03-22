<?php

const BASE_PATH = __DIR__.'/../';

require BASE_PATH.'functions.php';

spl_autoload_register(function ($class) {
    if (is_file(base_path($class.'.php'))) {
        require base_path($class.'.php');
    } else {
        require base_path('models/'.$class.'.php');
    }
});

require base_path('routing.php');
