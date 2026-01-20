<?php
namespace Services ;
use PDO ;
use PDOException;

class Database {
    private static ?PDO $connection = null;
    public static function get_connection():PDO{
        if(SELF::$connection == null){
            try {
                SELF::$connection = new PDO("pgsql:host=localhost;
                                            dbname=ISTICHARA", 
                                            "postgres","lahcen2025");
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return SELF::$connection;
    }
}
