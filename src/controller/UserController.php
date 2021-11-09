<?php

namespace Biyerful\controller;

use Biyerful\models\User;
use Biyerful\models\Like;
use Biyerful\models\Shortlist;
use Biyerful\services\DB;

class UserController extends Controller
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
        $ignored = (new Like())->isIgnored($user["id"]);
        $shortlisted = (new Shortlist())->isShortlisted($user["id"]);

        if (!$user) 
        {
            header("Location:/worngRoute");
        }
        view("user.show", [
            "user" => $user, 
            "liked" => $liked, 
            "ignored" => $ignored,
            "shortlisted" => $shortlisted
        ]);
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
            // remove both like & ignore first
            $whoLikes = user()["id"];
            $whomLiked = request("userid");
            $db = new DB();
            $r = $db->query("DELETE FROM likes WHERE user_id=$whoLikes AND subject_user_id=$whomLiked");
            
            
            $whoLikes = user()["id"];
            $whomLiked = request("userid");
            $db = new DB();
            $r = $db->query("INSERT INTO `likes`(`user_id`, `subject_user_id`, `type`) VALUES ($whoLikes,$whomLiked, 'like')");
            if ( $r ) 
            {
                $this->backup();
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

    // for ignoring any profile
    function ignore()
    {
        if ( request("userid") && is_int((int)request("userid")) && request("type") ) 
        {
            $whoLikes = user()["id"];
            $whomIgnored = request("userid");
            $type = request("type");
            $db = new DB();

            if ( $type == "ignore" ) 
            {
                // first delete the liked (if any)
                $db->query("DELETE FROM likes WHERE user_id=$whoLikes AND subject_user_id=$whomIgnored");
                $r = $db->query("INSERT INTO `likes` (`user_id`, `subject_user_id`, `type`) VALUES ($whoLikes, $whomIgnored, 'ignore')");
                if ( $r ) 
                {
                    $this->backup();
                    response(["msg" => "success", "type" => "ignored"]);
                }
                else 
                {
                    response(["msg" => "failed"]);
                }
            }
            else 
            {
                // first delete the liked (if any)
                $r = $db->query("DELETE FROM likes WHERE user_id=$whoLikes AND subject_user_id=$whomIgnored");
                if ( $r ) 
                {
                    $this->backup();
                    response(["msg" => "success", "type" => "unignored"]);
                }
                else 
                {
                    response(["msg" => "failed"]);
                }
            }
        }
        else 
        {
            response(["msg" => "failed"]);
        }
    }

    // for unliking any profile
    function unlike()
    {
        $whoLikes = user()["id"];
        $whomLiked = request("userid");
        $db = new DB();
        $r = $db->query("DELETE FROM likes WHERE user_id=$whoLikes AND subject_user_id=$whomLiked");
        if ($r) 
        {
            $this->backup();
            response(["msg" => "success", "type" => "unliked"]);
        } 
        else 
        {
            response(["msg" => "failed"]);
        }
    }


    // add to shortlist any profile
    function shortlist()
    {
        $whoDoes = user()["id"];
        $whoShortlisted = request("userid");

        if ( request("type") == "shortlist" ) 
        {
            $sql = "INSERT INTO `shortlisted`(`user_id`, `subject_user_id`) VALUES ('$whoDoes','$whoShortlisted')";
            $r = $this->db->query($sql);
            if ($r) 
            {
                $this->backup();
                response(["msg" => "success", "type" => "shortlisted"]);
            } 
            else 
            {
                response(["msg" => "failed"]);
            }
        }
        else 
        {
            $sql = "DELETE FROM shortlisted WHERE user_id=$whoDoes AND subject_user_id=$whoShortlisted";
            $r = $this->db->query($sql);
            if ($r) 
            {
                $this->backup();
                response(["msg" => "success", "type" => "unshortlisted"]);
            } 
            else 
            {
                response(["msg" => "failed"]);
            }
        }

    }

}
