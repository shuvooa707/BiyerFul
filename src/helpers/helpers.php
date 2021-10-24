<?php

    // namespace Biyerful\helpers;
    use Biyerful\services\Connection;
    use Biyerful\models\User;

    require_once __DIR__ . "/../../config/config.php";
    require_once __DIR__ . "/../../vendor/autoload.php";
    require_once __DIR__ . "/../models/User.php";
    
    // function to check if user is logged in
    function check()
    {
        if (session_status() === PHP_SESSION_NONE) 
        {
            session_start();
        }
        if ( isset($_SESSION["logged in"]) && $_SESSION["logged in"] == "yes" ) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    // function to return user if logged in
    function user()
    {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if( check() )
        {
            return (new User)->find($_SESSION["user_id"]);
        }
        else 
        {
            return false;
        }
    }


    function logout()
    {
        try 
        {
            if (session_status() === PHP_SESSION_NONE) 
            {
                session_start();
            }
            $_SESSION["logged in"] = null;
            $_SESSION["user_id"] = null;
            session_destroy();

            // dd($_SESSION["logged in"]);
            return true;
        } 
        catch (\Throwable $th) 
        {
            dd();
            return false;
        }
    }

    function session($key, $value = null)
    {
        if (session_status() === PHP_SESSION_NONE) 
        {
            session_start();
        }

        // To Set value
        if ( $value ) 
        {
            $_SESSION[$key] = $value;
        }
        // To Get Value
        else 
        {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : "";
        }

        return true;
    }

    // function to attempt login -> boolen
    function attempt($username = null, $password = null)
    {
        if ( !(isset($username) && isset($password)) )
        {
            return false;
        }
        else 
        {
            // attempt to login
            try 
            {
                $conn = (new Connection())->getConn();
                $conn = $conn->prepare("select * from users where username = :username");
                $conn->bindParam(":username", $username);
                $executionResult = $conn->execute();
                $r = $conn->fetch();
                if ( !$executionResult || !$r ) 
                {
                    return false;
                }
                $fetchedPassword = $r["password"];
                if (password_verify($password, $fetchedPassword))
                {
                    // dd($r);
                    session("logged in", "yes");
                    session("user_id", $r["id"]);
                    return $r;
                } 
                else 
                {
                    return false;
                }
                exit(0);
            } 
            catch (\Throwable $th) 
            {
                dd($th);
                return false;
            }
        }
    }

    // return public absolute path for given object
    function url( $relative_url = "" )
    {
        return "/public/" . $relative_url;
    }

    function app_base()
    {
        return APP_BASE;
    }


    if (!function_exists('dd')) 
    {
        function dd()
        {
            foreach (func_get_args() as $x) 
            {
                dump($x);
            }
            die;
        }
    }




    function request($key = null)
    {
        if ( $key ) 
        {
            // if request is POST
            if ( $_SERVER["REQUEST_METHOD"] == "POST" ) 
            {
                if ( isset($_POST[$key]) ) 
                {
                    return $_POST[$key];
                }
                return null;
            }
            // if GET request
            if ($_SERVER["REQUEST_METHOD"] == "GET") 
            {
                if (isset($_GET[$key])) 
                {
                    return $_GET[$key];
                }
                return null;
            }
        }
        
        return $_SERVER;
    }


    function response( $param = null )
    {
        echo json_encode($param);
        exit(0);
    }


    function view( $view, $param = [] )
    {
        extract($param);
        $view = str_replace( ".", "\/", $view );
        require_once __DIR__ . "/../views/" . $view . ".php";
        exit(0);
    }


    function makehash($data)
    {
        return password_hash($data, PASSWORD_BCRYPT);
    }
    // echo file_get_contents(url("css/apple.txt"));



// 