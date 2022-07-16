<?php

spl_autoload_register(
    function ($class) {
        // $path       = "./includes/classes/";
        $path       =  __DIR__ . "/classes/";
        $className  = "class.$class.php";
        $fileName   = $path . $className;

        if (file_exists($fileName)) {
            include_once $fileName;
        }
    }
);

include_once __DIR__ . '/function.php';