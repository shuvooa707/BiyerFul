<?php


namespace Biyerful\services;

class DB extends Connection
{
    protected $table = null;
    public function __construct($table = null)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function query($sql = null)
    {
        if ($sql) 
        {
            return $this->conn->query($sql);
        }
        else 
        {
            return null;
        }
    }

    public function find( $id, $column = "*" )
    {
        if ( $column !== "*" && is_array($column) ) 
        {
            $column = implode(",", $column);
        }
        $sql = "SELECT $column FROM `$this->table` WHERE id = " . $id;
        // dd($this->conn->query($sql)->fetch());
        return $this->conn->query($sql)->fetch();
    }

    public function create( $pairValues )
    {     
        
        $keys = "`" . implode("`,`", array_keys($pairValues)) . "`";
        $values = "'" . implode("','", array_values($pairValues)) . "'";


        // setting image field
        $keys = "`" . implode("`,`", array_keys($pairValues)) . "`";
        $values = "'" . implode("','", array_values($pairValues)) . "'";

        $sql = "INSERT INTO `$this->table` ($keys) VALUES($values)";
        if ($this->conn->query($sql))
        {
            $query = $this->conn->prepare("SELECT * FROM `$this->table` WHERE id = " . $this->conn->lastInsertId());
            $query->execute();
            $row = $query->fetch();
            
            // backuing up database offline 
            $this->backup();
            return $row;
        }

        return false;
    }

    public function update( $id, $pairValues )
    {
        if(!is_numeric($id))
        {
            return false;
        }

        $tmp = "";
        foreach ($pairValues as $key => $value) 
        {
            $tmp  .= "$key = '$key', ";
        }
        $tmp = rtrim($tmp, ", ");
        $sql = "UPDATE `$this->table` SET $tmp WHERE `id` = $id";
        $this->conn->query($sql);
    }

    public function destroy( $id ) 
    {
        $sql = "DELETE FROM `$this->table` WHERE `id` = $id";
        $this->conn->query($sql);
    }
}




// 