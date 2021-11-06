<?php

namespace Biyerful\models;
use Biyerful\Library\Traits\BackupDatabase; 
use Biyerful\services\DB;

class Model extends DB
{
    use BackupDatabase;

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
        try 
        {
            $r = $this->conn->query("select * from $this->table");
            return $r->fetchAll();
        } 
        catch (\Throwable $th) 
        {
            return false;
        }
    }

    public function insert($column = [], $values = [])
    {
        try
        {
            // if not enough values provided 
            if ( count($column) != count($values) ) 
            {
                return false;
            }

            $fields = "";
            $v = "";

            $len = count($column) - 1;
            for ($i=0; $i < $len; $i++) 
            { 
                $fields .= "'" . $column[$i] . "'" . ",";
                $v .=  "'" . $values[$i] . "'" . ",";
            }

            $fields .= $column[$i];
            $v .= $values[$i];

            $sql = "INSERT INTO $this->table ($fields) VALUES ($v)";
            $r = $this->conn->query($sql);

            if ( $r ) 
            {
                return true;
            }

            return false;
        }
        catch (\Throwable $th) 
        {
            return false;
        }
        
    }

}


// 