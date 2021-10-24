<?php

// show login page
if (preg_match('/(\/)?login$/i', $param) && $_SERVER["REQUEST_METHOD"] == "GET") 
{
    $path = __DIR__ . "/../controller/LoginController.php";
    if (file_exists($path)) {
        // including the controller 
        require_once $path;
        // invoking the method
        login();
    } else {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}

// sign in 
else if ( preg_match('/(\/)?login\/signin$/i', $param)  && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    $path = __DIR__ . "/../controller/LoginController.php";
    if (file_exists($path)) {
        // including the controller 
        require_once $path;
        // invoking the method
        signin();
    } else {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}




// show user
else if (preg_match('/(\/)?signout$/i', $param)) {
    $path = __DIR__ . "/../controller/LoginController.php";
    if (file_exists($path)) {
        // including the controller 
        require_once $path;
        // invoking the method
        signout();
    } else {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}
