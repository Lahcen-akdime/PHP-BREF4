<?php
namespace models;
use models\Person ;
// require_once "Person.php";
class Huissier extends Person{
    protected string $types_actes ;
    public function edit($id,$name,$consultation_en_ligne,$Annes_dex,$ville_id,$types_actes){
        $operation = self::$connection->prepare("UPDATE huissier set name=:name,
                                                consultation_en_ligne=:consultation_en_ligne,
                                                Annes_dex=:Annes_dex,
                                                ville_id=:ville_id,
                                                types_actes=:types_actes WHERE id = :id");
        $operation -> execute([":name"=>$name,":consultation_en_ligne"=>$consultation_en_ligne,":Annes_dex"=>$Annes_dex,
                                ":ville_id"=>$ville_id,":types_actes"=>$types_actes,":id"=>$id]);
    }
}