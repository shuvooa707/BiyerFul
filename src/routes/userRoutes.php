<?php

namespace Biyerful\Routes;
use Biyerful\controller\UserController;

$userController = new UserController();

//  all users
if ( preg_match('/(\/)?users$/i', $param) ) 
{
    $path = __DIR__ . "/../controller/UserController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $userController->index();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}

// create user
else if ( preg_match('/(\/)?user\/create$/i', $param) ) 
{
    $path = __DIR__ . "/../controller/UserController.php";
    if ( file_exists($path) ) 
    {
        // including the controller 
        require_once $path;
        // invoking the method
        $userController->create();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}

// store user
else if ( preg_match('/(\/)?user\/store$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    $path = __DIR__ . "/../controller/UserController.php";
    if ( file_exists($path) ) 
    {
        // including the controller 
        require_once $path;
        // invoking the method
        $userController->store();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}

// show user
else if ( preg_match('/(\/)?user\/\d+$/i', $param) ) 
{
    // check if logged in
    if (!check()) 
    {
        header("Location:/");
        exit(0);
    }

    $userController->show($param);
}

// edit user
else if ( preg_match('/(\/)?user\/edit\/\d+$/i', $param) ) 
{
    $path = __DIR__ . "/../controller/UserController.php";
    if ( file_exists($path) ) 
    {
        // including the controller 
        require_once $path;
        // invoking the method
        $userController->edit();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}

// update user
else if ( preg_match('/(\/)?user\/update$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST" ) 
{
    $path = __DIR__ . "/../controller/UserController.php";
    if ( file_exists($path) ) 
    {
        // including the controller 
        require_once $path;
        // invoking the method
        $userController->update();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}

// destroy user
else if (preg_match('/(\/)?user\/destroy$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    $path = __DIR__ . "/../controller/UserController.php";
    if (file_exists($path)) {
        // including the controller 
        require_once $path;
        // invoking the method
        $userController->destroy();
    } else {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }  
}


// like user
else if (preg_match('/(\/)?user\/like$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $userController->like();
}

// unlike user
else if (preg_match('/(\/)?user\/unlike$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $userController->unlike();
}


// ignore user
else if (preg_match('/(\/)?user\/ignore$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $userController->ignore();
}
