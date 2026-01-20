<?php
namespace Services;

use PDO;
use PDOException;

class Database {

    private static ?PDO $connection = null;

    public static function get_connection(): PDO
    {
        if (self::$connection === null) {
            try {
                $host = "ep-twilight-waterfall-ahhjopyw-pooler.c-3.us-east-1.aws.neon.tech";
                $db   = "ISTICHARA";
                $user = "neondb_owner";
                $pass = "npg_uUedgOlc72to";
                $port = "5432";

                $dsn = "pgsql:host=$host;port=$port;dbname=$db;sslmode=require";

                self::$connection = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);

            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
