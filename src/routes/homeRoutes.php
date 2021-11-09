<?php

use Biyerful\controller\HomeController;

$homeController = new HomeController();



//  Home 
if ( $param == "" || $param == "/" || preg_match('/(\/)\?page=\d+$/i', $param) ) 
{
    preg_match("/(?<=page\=)\d+/", $param, $page);
    $homeController->index((int)$page);

    exit(0);
} 







?>