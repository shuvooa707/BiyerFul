<?php

namespace Biyerful\controller;
use Biyerful\models\User;


class RegisterController 
{
    protected $model = null;
    public function __construct()
    {
        $this->model = new User();
    }

    public function index()
    {

        require_once __DIR__ . "/../views/register/register.php";
        exit(0);
    }

    public function store()
    {

        /***   Save file    ***/
        if (isset($_FILES['image'])) 
        {
            $errors = array();
            $file_name = time();
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_ext = explode('.', $_FILES['image']['name']);
            $file_ext = array_pop($file_ext);

            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) 
            {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152) 
            {
                $errors[] = 'File size must be excately 2 MB';
            }

            if (empty($errors) == true) 
            {
                move_uploaded_file($file_tmp, url("image/") . $file_name . "." . $file_ext);
            } 
            else 
            {
                print_r($errors);
            }
        }
        /***   /Save file    ***/


        $user = $this->model->create([
            "name" => request("fname") . " " . request("fname"),
            "slug" => str_replace(" ","-", trim(request("fname") . " " . request("fname"))),
            "age" => request("age"),
            "email" => request("email"),
            "image" => $file_name . "." . $file_ext,
            "username" => request("username"),
            "password" => makehash(request("password")),
        ]);

        // if user is created
        if ($user) 
        {
            // attempt login
            attempt(request("username"), request("password"));
            header("Location:/profile");
            exit(0);
        } 
        else 
        {
            header("Location:/register");
            die();
        }

        exit(0);
    }

    public function signin()
    {
        echo "sign in";
        exit(0);
    }

    public function signout()
    {
        echo "sign out";
        exit(0);
    }
}
