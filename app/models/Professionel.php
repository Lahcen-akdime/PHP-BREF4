<?php
namespace models ;
class Professionel extends User {
    protected bool $consultation_en_ligne ;
    protected int $Annes_dex ;
    protected int $ville_id ;
    protected float $taarif;
    protected array $document;
    protected static \PDO $connection ;
    protected object $disponibilite;
    public function __construct(\PDO $connection) {
        self::$connection = $connection;
    }
    public function getAll($tableName){
    $data = self::$connection -> query("SELECT * FROM $tableName") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function create($tableName,$columnName,$name,$selected,
                           $consultation_en_ligne,$Annes_dex,$ville_id){
    $operation = self::$connection->prepare("INSERT INTO $tableName(name,$columnName,
                            consultation_en_ligne,Annes_dex,ville_id)
                            VALUES(:name,:selected,:consultation_en_ligne,
                            :Annes_dex,:ville_id)");
    
    $operation -> execute([":name"=>$name,":selected"=>$selected,           
                            ":consultation_en_ligne"=>$consultation_en_ligne,
                            ":Annes_dex"=>$Annes_dex,":ville_id"=>$ville_id]);
    }
    public function delete($tableName,$id){
        self::$connection->query("DELETE FROM $tableName WHERE id = $id");
    }
    public function getUser($tableName,$id){
    $data = self::$connection -> query("SELECT * FROM $tableName WHERE id = $id") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data[0] ;
    }
    public function search($tableName,$indice){
    $data = self::$connection -> query("SELECT * FROM $tableName WHERE name LIKE '$indice%'") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function filter($tableName,$indice){
    $data = self::$connection -> query("SELECT * FROM $tableName WHERE specialite = '$indice'") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function displayByPage($tableName,$currentPage){
    $startIn = ($currentPage - 1) * 4 ;
    $data = self::$connection -> query("SELECT * FROM $tableName Limit 4 OFFSET $startIn") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    
}
