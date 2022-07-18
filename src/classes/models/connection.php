<?php

namespace App\Model;

class Database
{
    private static object $con;

    public static function getConnection(): object
    {
        try {
            self::$con = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
            self::$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            if (!isset(self::$con)) {
                self::$con = new Database();
            }
            return self::$con;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}