<?php

class Connection
{
    private static $db;

    private function __construct()
    {
    }

    public  static function connect()
    {
        if (!self::$db) {
            self::$db = new PDO(
                Config::get('db/db_type') . ':host=' . Config::get('db/host') . ';dbname=' . Config::get('db/db_name'),
                Config::get('db/user'),
                Config::get('db/password')
            );
        }

        return self::$db;
    }
}
