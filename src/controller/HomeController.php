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
        
        if (check()) 
        {
            $userid = (user()["id"]);
        }
        else 
        {
            $userid = -1;
        }
        
        $db = new DB();
        // show only opposite gender profiles
        if ( check() &&  user()["gender"] == "male" )
        {
            $sql = "select * from users where gender = 'male' AND id NOT IN (SELECT subject_user_id FROM likes WHERE user_id=$userid) order by created_at limit 0,10;";
            // dd($sql);
            $users = $db->query($sql)->fetchAll();
        }
        else if( check() && user()["gender"] == "female" ) 
        {
            $sql = "select * from users where gender = 'male' AND id NOT IN (SELECT subject_user_id FROM likes WHERE user_id=$userid) order by created_at limit 0,10;";
            // dd($sql);
            $users = $db->query($sql)->fetchAll();
        }
        else 
        {
            $users = $db->query("select * from users")->fetchAll();
        }


        return $users;
    }

}