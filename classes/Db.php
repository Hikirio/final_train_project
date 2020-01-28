<?php

class Db
{
    protected static $host = "localhost";
    protected static $dbname = "final_train";
    protected static $user = "root";
    protected static $pass = "";

    private static function getConnection()
    {
        $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$user, self::$pass);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array())
    {
        $stmt = self::getConnection()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }
}

