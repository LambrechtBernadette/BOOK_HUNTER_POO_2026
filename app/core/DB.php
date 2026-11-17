<?php

namespace Core;
use PDO;
use PDOException;

abstract class DB
{
   
    public static function getConnexion(): PDO
    {
        try {
            return new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPWD);
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
