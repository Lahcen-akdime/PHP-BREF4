<?php
namespace models ;
class Person {
    protected int $id ;
    protected string $name ;
    protected bool $consultation_en_ligne ;
    protected int $Annes_dex ;
    protected int $ville_id ;
    protected static \PDO $connection ;
    public function __construct(\PDO $connection) {
        self::$connection = $connection;
    }
    public function getAll($tableName){
    $data = self::$connection -> query("SELECT * FROM $tableName") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function villeName($id){
    $villeName = self::$connection -> query("SELECT name FROM ville WHERE id = $id") -> fetchAll(\PDO::FETCH_NUM);
    return $villeName[0][0];
    }
}