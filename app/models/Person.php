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
    public function create($tableName,$columnName,$name,$selected,
                           $consultation_en_ligne,$Annes_dex,$ville_id){
    $operation = self::$connection->query("INSERT INTO $tableName(name,:columnName,
                            consultation_en_ligne,Annes_dex,ville_id)
                            VALUES(:name,:selected,:consultation_en_ligne,
                            :Annes_dex,:ville_id)");
    
    $operation -> execute([":name"=>$name,":selected"=>$selected,
                            ":consultation_en_ligne"=>$consultation_en_ligne,
                            ":Annes_dex"=>$Annes_dex,":ville_id"=>$ville_id]);
    }
}