<?php

namespace Biyerful\models;
use Biyerful\services\DB;

class Model extends DB
{
    protected $table = "";

    public function __construct()
    {
        parent::__construct();
    }
    function tablename()
    {
        return $this->table;
    }

    public function all()
    {
        $r = $this->conn->query("select * from $this->table");
        return $r->fetchAll();
    }
}


// 