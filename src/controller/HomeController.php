<?php

namespace Biyerful\controller;
use Biyerful\services\DB;

class HomeController extends Controller
{

    public function index($page = 0)
    {
        $users = $this->visibleUsers($page);
        view("home.index",["users" => $users, "totalUsers" => count($users)]);
        exit(0);
    }

    public function store()
    {
        print_r($_POST["name"]);
    }


    protected function visibleUsers($page = 10)
    {
        
        $db = new DB();

        // show only opposite gender profiles
        if ( check() &&  user()["gender"] == "male" )
        {
            $users = $db->query("select * from users where gender = 'female'")->fetchAll();
        }
        else if( check() && user()["gender"] == "female" ) 
        {
            $users = $db->query("select * from users where gender = 'male' ")->fetchAll();
        }
        else 
        {
            $users = $db->query("select * from users")->fetchAll();
        }

        return $users;
    }

}