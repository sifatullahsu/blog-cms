<?php

require("./includes/config.php");

class DB {

    private static function connection() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $conn = new PDO($dsn, DB_USER, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $conn;
        } catch (PDOException $e) {
            die('Faild DB Connection: ') . $e->getMessage();
        }
    }

    public static function prepare($sql) {
        return self::connection()->prepare($sql);
    }
}