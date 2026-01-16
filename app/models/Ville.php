<?php
namespace models ;
class Ville{
    private static \PDO $connection ;
    public function __construct($database)
    {
       self::$connection = $database ;
    }
  public function villeName($id){
    $villeName = self::$connection -> query("SELECT name FROM ville WHERE id = $id") -> fetchAll(\PDO::FETCH_NUM);
    return $villeName[0][0];
    }
    public function getAll(){
    $all = self::$connection -> query("SELECT * FROM ville") -> fetchAll(\PDO::FETCH_ASSOC);
    return $all ;
    }
}