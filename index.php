<?php

use Biyerful\controller\HomeController;


require_once "src/helpers/helpers.php";
require_once "vendor/autoload.php";



// Get Controller Name
if ($_SERVER["REQUEST_METHOD"] == "GET" || $_SERVER["REQUEST_METHOD"] == "POST") 
{
    $param = explode("/code/PHP/Projects/biyerFul/src/", $_SERVER["REQUEST_URI"]);
    $param = end($param);
    
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