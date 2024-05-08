<?php
class Database {
    private static $connection;
    
    public static function connect() {
        if (!self::$connection) {
            self::$connection = new mysqli("localhost", "root", "", "btl_ltw");
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
?>