<?php
namespace Services ;
use PDO ;
class Database {
    private static ?PDO $connection = null;
    public static function get_connection():PDO{
        if(SELF::$connection == null){
        SELF::$connection = new PDO("mysql:host=localhost;dbname=istichara;
        port=3307;charset=utf8mb4",'root','');
        }
        return SELF::$connection;
    }
}