<?php
    namespace Biyerful\services;
    use PDO;
    
require_once __DIR__ . "/../../config/config.php";


class Connection
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new PDO(DBTYPE . ":host=". SERVERNAME .";dbname=". DBNAME, USERNAME, PASSWORD);
    }

    public function getConn()
    {
        return $this->conn;
    }
}


// 