<?php
namespace models;
use models\Person ;
// require_once "Person.php";
class Avocat extends Person {
    protected string $types_actes ;
    public function edit($id,$name,$consultation_en_ligne,$Annes_dex,$ville_id,$specialite){
        $operation = self::$connection->prepare("UPDATE  avocat set name=:name,
                                                consultation_en_ligne=:consultation_en_ligne,Annes_dex=:Annes_dex,
                                                ville_id=:ville_id,specialite=:specialite WHERE id = :id");
        $operation -> execute([":name"=>$name,":consultation_en_ligne"=>$consultation_en_ligne,":Annes_dex"=>$Annes_dex,
                                ":ville_id"=>$ville_id,":specialite"=>$specialite,":id"=>$id]);
    }
}
