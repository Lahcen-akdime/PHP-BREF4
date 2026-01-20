<?php
namespace models;
use models\Professionel ;
// require_once "Professionel.php";
class Huissier extends Professionel{
    protected string $types_actes;
    public function edit($id,$name,$consultation_en_ligne,$Annes_dex,$ville_id,$types_actes){
        $operation = self::$connection->prepare("UPDATE huissiers set name=:name,
                                                consultation_en_ligne=:consultation_en_ligne,
                                                Annes_dex=:Annes_dex,
                                                ville_id=:ville_id,
                                                types_actes=:types_actes WHERE id = :id");
        $operation -> execute([":name"=>$name,":consultation_en_ligne"=>$consultation_en_ligne,":Annes_dex"=>$Annes_dex,
                                ":ville_id"=>$ville_id,":types_actes"=>$types_actes,":id"=>$id]);
    }
}