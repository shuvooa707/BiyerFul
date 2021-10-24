<?php

namespace Biyerful\controller;
use Biyerful\models\User;


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
}