<?php

namespace App\Class\Models;

class Database
{
    private static object $con;

    public static function getDatabaseConnect(): object
    {
        try {
            self::$con = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);
            self::$con->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            if (!isset(self::$con)) {
                self::$con = new Database();
            }
            return self::$con;
        } catch (\PDOException $e) {
            error_log($e->getMessage(), 3, 'app.log');
        }
    }
}