<?php
$config = '../config.php';
if(file_exists($config)){
    require_once $config;
}else{
    require_once 'config.php';
}
class Statistcs
{
    public static function retreiveCount($table)
    {
        global $dbh;
        $sql = $dbh->prepare("SELECT id FROM $table");
        $sql->execute();
        return $sql->rowCount();
    }
}

