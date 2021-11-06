<?php

function backup()
{
    $command = "mysqldump  --user='root'  biyerful > database\biyerful.sql";

    system($command);
}
backup();

?>