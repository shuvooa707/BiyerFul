<?php

namespace Biyerful\controller;

use Biyerful\Library\Traits\BackupDatabase;
use Biyerful\services\DB;

class Controller
{
    use BackupDatabase;

    public function __construct()
    {
        $this->db = new DB();
    }
}




// 