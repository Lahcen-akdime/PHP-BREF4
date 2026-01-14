<?php
namespace models ;
use PDO ;
class Ville{
    private static PDO $connection ;
    public function __construct($database)
    {
       self::$connection = $database ;
    }
  public function villeName($id){
    $villeName = self::$connection -> query("SELECT name FROM ville WHERE id = $id") -> fetchAll(\PDO::FETCH_NUM);
    return $villeName[0][0];
    }
}