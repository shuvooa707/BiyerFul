<?php

namespace Biyerful\controller;
use Biyerful\services\DB;

class HomeController extends Controller
{

    public function index()
    {
        $db = new DB();
        if ( check() &&  user()["gender"] == "male" )
        {
            $users = $db->query("select * from users where gender = 'female' ")->fetchAll();
        }
        else if( check() && user()["gender"] == "female") 
        {
            $users = $db->query("select * from users where gender = 'male' ")->fetchAll();
        }
        else 
        {
            $users = $db->query("select * from users")->fetchAll();
        }
        // dd( $users );
        view("home.index",["users" => $users, "totalUsers" => count($users)]);
        exit(0);
    }

    public function store()
    {
        print_r($_POST["name"]);
    }

}