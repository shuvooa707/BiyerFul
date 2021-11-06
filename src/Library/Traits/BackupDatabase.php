<?php

namespace Biyerful\Library\Traits; 

trait BackupDatabase
{
    public function backup()
    {
        $command = "mysqldump  --user='root'  biyerful > database\biyerful1.sql";
        system($command);
    }
}





?>