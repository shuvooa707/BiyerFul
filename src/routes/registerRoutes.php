<?php

namespace Biyerful\Routes\registerRoute;
use Biyerful\controller\RegisterController;


$RegisterController = new RegisterController();

//  register
if (preg_match('/(\/)?register$/i', $param)) 
{
    $RegisterController->index();
    // $path = __DIR__ . "/../controller/RegisterController.php";
    // if (file_exists($path)) {
    //     require_once $path;
    //     index();
    // } else {
    //     require_once __DIR__ . "/../controller/NotFoundController.php";
    //     error("NotFoundController Not Found");
    // }

    exit(0);
}


// store user
else if (preg_match('/(\/)?register\/store$/i', $param) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $path = __DIR__ . "/../controller/RegisterController.php";
    if (file_exists($path)) {
        // including the controller 
        require_once $path;
        // invoking the method
        $RegisterController->store();
    } else {
        require_once __DIR__ . "/../controller/NotFoundController.php";
        error("NotFoundController Not Found");
    }
}
