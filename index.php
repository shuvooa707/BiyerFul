<?php

use Biyerful\controller\HomeController;


require_once "src/helpers/helpers.php";
require_once "vendor/autoload.php";


// dd($_SERVER);

// dump(__DIR__, $_SERVER["REQUEST_URI"]);

// Get controller Name
if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") 
{
    $param = explode("/code/PHP/Projects/biyerFul/src/", $_SERVER["REQUEST_URI"]);
    $param = end($param);
    // dd($param);
    // $param = $_SERVER["REQUEST_URI"];
    // dd(preg_match('/(\/)$/i', $param));
    // preg_match('/product\/\d+/i', $param, $param);
    
}

/*
*
*  Rotung Table
*
*/

//  Home 
if ( $param == "" || $param == "/" ) 
{
    $homeController = new HomeController();
    $homeController->index();
    // $path = "src/controller/HomeController.php";
    // if (file_exists($path)) 
    // {
    //     require_once $path;
    //     index();
    // } 
    // else 
    // {
    //     require_once "controller/NotFoundController.php";
    //     error("NotFoundController Not Found");
    // }
    exit(0);
} 


/*
*   including all the routes
*
*/

$routesFolderPath = "src/routes";
$routes = scandir($routesFolderPath);
$routes = array_diff($routes, array('.', '..'));

foreach ($routes as $file) 
{
    require_once $routesFolderPath . "/" . $file;
}


// Wrong Route 404
require_once "src/controller/NotFoundController.php";



?>