<?php


function login()
{

    require_once __DIR__ . "/../views/login/login.php";
    exit(0);
}

function signin()
{
    if ( $r = attempt(request("username"), request("password")) ) 
    {
        session("logged in", "yes");
        session("user_id", $r["id"]);
        header("Location:/");
        exit(0);
    }
    else 
    {
        session("error", true);
        session("epassword", true);
        session("username", request("username"));
        session("password", request("password"));
        header("Location:/login");
        exit(0);
    }
}

function signout()
{
    if(logout())
    {
        header("Location:/");
    }
    exit(0);
}