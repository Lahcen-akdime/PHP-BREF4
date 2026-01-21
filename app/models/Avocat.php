<?php
namespace models;
use models\Professionel ;
// require_once "Professionel.php";
class Avocat extends Professionel {
    protected string $specialite ;
    public function edit($id,$name,$consultation_en_ligne,$Annes_dex,$ville_id,$specialite){
        $operation = self::$connection->prepare("UPDATE  avocats set name=:name,
                                                consultation_en_ligne=:consultation_en_ligne,Annes_dex=:Annes_dex,
                                                ville_id=:ville_id,specialite=:specialite WHERE id = :id");
        $operation -> execute([":name"=>$name,":consultation_en_ligne"=>$consultation_en_ligne,":Annes_dex"=>$Annes_dex,
                                ":ville_id"=>$ville_id,":specialite"=>$specialite,":id"=>$id]);
    }
    public function top3(){
$data = self::$connection-> query("SELECT name , Annes_dex
FROM avocats
ORDER BY Annes_dex DESC LIMIT 3");
return $data ;
    }
    
}
