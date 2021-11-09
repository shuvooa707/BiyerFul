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



//  Shortlisted Profiles
if ( preg_match('/(\/)?profile\/shortlisted$/i', $param) && $_SERVER["REQUEST_METHOD"] == "GET") 
{
    $path = __DIR__ . "/../controller/ProfileController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $profileController->shortlisted();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}

//  Ignored Profiles
if ( preg_match('/(\/)?profile\/ignored$/i', $param) && $_SERVER["REQUEST_METHOD"] == "GET") 
{
    $path = __DIR__ . "/../controller/ProfileController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $profileController->ignored();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}

//  Liked Profiles
if ( preg_match('/(\/)?profile\/liked$/i', $param) && $_SERVER["REQUEST_METHOD"] == "GET") 
{
    $path = __DIR__ . "/../controller/ProfileController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $profileController->liked();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}


//  Blocked Profiles
if ( preg_match('/(\/)?profile\/blocked$/i', $param) && $_SERVER["REQUEST_METHOD"] == "GET") 
{
    $path = __DIR__ . "/../controller/ProfileController.php";
    if ( file_exists($path) ) 
    {
        require_once $path;
        $profileController->blocked();
    }
    else
    {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }

    exit(0);
}


