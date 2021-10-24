<?php

use Biyerful\controller\ProfileController;

$profileController = new ProfileController();

//  Show Profile
if ( preg_match('/(\/)?profile$/i', $param) ) 
{
    $path = __DIR__ . "/../controller/ProfileController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $profileController->index();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}


//  Edit Profile
if ( preg_match('/(\/)?profile\/edit$/i', $param) ) 
{
    $profileController->edit();
    
    // $path = __DIR__ . "/../controller/ProfileController.php";
    // if ( file_exists($path) ) 
    // {
    //     require_once $path;
    // }
    // else
    // {
    //     require_once __DIR__ . "/../controller/NotFoundController.php";
    //     error("NotFoundController Not Found");
    // }

    exit(0);
}

//  Update Profile
if ( preg_match('/(\/)?profile\/update$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    $path = __DIR__ . "/../controller/ProfileController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $profileController->update();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}
