<?php

namespace Biyerful\controller;

use Biyerful\models\User;
use Biyerful\models\Like;
use Biyerful\services\DB;

class UserController 
{
    function index()
    {
        view("user.index");
        exit(0);
    }

    function show($param)
    {
        preg_match("/(?<=user\/)\d+$/", $param, $userid);
        $user = (new User())->find(end($userid));
        $liked = (new Like())->isLiked($user["id"]);

        // dd($liked);
        if (!$user) 
        {
            header("Location:/worngRoute");
        }
        view("user.show", ["user" => $user, "liked" => $liked]);
        exit(0);
    }

    function create()
    {
        require_once __DIR__ . "/../views/user/create.php";
        exit(0);
    }

    function store()
    {
        print_r($_POST["title"]);
        exit(0);
    }

    function edit()
    {
        require_once __DIR__ . "/../views/user/edit.php";
        exit(0);
    }

    function update()
    {
        dd($_POST);
        die;
    }

    function destroy()
    {
        echo "remove User";
    }

    // for liking any user
    function like()
    {
        if ( request("userid") && is_int((int)request("userid")) && request("type") ) 
        {
            if ( request("type") != "like" ) 
            {
                return $this->unlike();
            }
            $whoLikes = user()["id"];
            $whomLiked = request("userid");
            $db = new DB();
            $r = $db->query("INSERT INTO `likes`(`user_id`, `liked_user_id`) VALUES ($whoLikes,$whomLiked)");
            if ( $r ) 
            {
                response(["msg" => "success", "type" => "liked"]);
            }
            else 
            {
                response(["msg" => "failed"]);
            }
        }
        else 
        {
            response(["msg" => "failed"]);
        }
    }

    function unlike()
    {
        $whoLikes = user()["id"];
        $whomLiked = request("userid");
        $db = new DB();
        $r = $db->query("DELETE FROM likes WHERE user_id=$whoLikes AND liked_user_id=$whomLiked");
        if ($r) 
        {
            response(["msg" => "success", "type" => "unliked"]);
        } 
        else 
        {
            response(["msg" => "failed"]);
        }

    }

}
