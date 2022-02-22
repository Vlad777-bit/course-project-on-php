<?php

use TestFolder\User_Age\User_Age;
use TestFolder\UserName\UserName;

spl_autoload_register(function ($class)
{
    $file = sprintf(
        "src/%s.php",
        str_replace('\\',
            DIRECTORY_SEPARATOR,
            $class
        )
    );

    $formatted = str_replace('_', '/', $file);
    if (file_exists($file)) {
        require $file;
        echo $class . " => " . $formatted . "\n";
    }
});

$test1 = new User_Age();
$test2 = new UserName();
