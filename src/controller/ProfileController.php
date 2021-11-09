<?php

namespace Biyerful\controller;
use Biyerful\models\User;
use Biyerful\services\DB;

class ProfileController 
{
    public function index()
    {
        $user = (new User())->find(user()["id"]);
        view("profile.index", ["user" => $user]);
        exit(0);
    }

    public function show($param)
    {
        echo "Single User";
        exit(0);
    }

    public function create()
    {
        require_once __DIR__ . "/../views/user/create.php";
        exit(0);
    }

    public function store()
    {
        print_r($_POST["title"]);
        exit(0);
    }

    public function edit()
    {
        $user = (new User())->find(user()["id"]);
        view("profile.edit", ["user" => $user]);
        exit(0);
    }

    public function update()
    {
        $name = request("name");
        $age = request("age");
        $gender = request("gender");
        dd($name);
        die;
    }

    public function destroy()
    {
        echo "remove User";
    }


    public function shortlisted()
    {
        $userid = check() ? user()["id"] : -1;
        $sql = "SELECT * FROM users WHERE id IN  (SELECT subject_user_id FROM `shortlisted` WHERE user_id = $userid)";
        $users = (new DB())->query($sql)->fetchAll();
        
        view("profile.shortlisted", ["users" => $users, "totalUsers" => count($users)]);
        exit(0);
    }

    public function liked()
    {
        $userid = user()["id"];
        $sql = "SELECT * FROM users WHERE id IN  (SELECT subject_user_id from likes WHERE user_id=$userid)";
        $users = (new DB())->query($sql)->fetchAll();
        // dd($users);
        view("profile.liked", ["users" => $users, "totalUsers" => count($users)]);
        exit(0);
    }

    public function ignored()
    {
        $userid = user()["id"];
        $sql = "SELECT * FROM users WHERE id IN  (SELECT subject_user_id from likes WHERE user_id=$userid)";
        $users = (new DB())->query($sql)->fetchAll();
        // dd($users);
        view("profile.ignored", ["users" => $users, "totalUsers" => count($users)]);
        exit(0);
    }

    public function blocked()
    {
        $userid = check() ? user()["id"] : -1;
        $sql = "SELECT * FROM users WHERE id IN  (SELECT subject_user_id FROM `blocked` WHERE user_id = $userid)";
        $users = (new DB())->query($sql)->fetchAll();
        
        view("profile.blocked", ["users" => $users, "totalUsers" => count($users)]);
        exit(0);
    }
}