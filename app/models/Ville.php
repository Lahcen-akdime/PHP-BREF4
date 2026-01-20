<?php
namespace models ;
class Ville{
    private static \PDO $connection ;
    public function __construct($database)
    {
       self::$connection = $database ;
    }
  public function villeName($id){
    $villeName = self::$connection -> query("SELECT name FROM villes WHERE id = $id") -> fetchAll(\PDO::FETCH_NUM);
    return $villeName[0][0];
    }
    public function getAll(){
    $all = self::$connection -> query("SELECT * FROM villes") -> fetchAll(\PDO::FETCH_ASSOC);
    return $all ;
    }
    public function gitCountByVille($villeName,$villeId){
      $totale = self::$connection -> query("SELECT COUNT(*) FROM $villeName WHERE ville_id = $villeId")->fetchColumn();
      return $totale ;
    }
}