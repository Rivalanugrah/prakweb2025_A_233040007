<?php

require_once __DIR__ . '/config/config.php';


spl_autoload_register(function ($className) {
    $file = __DIR__ . '/core/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

