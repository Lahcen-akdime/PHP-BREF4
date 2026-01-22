<?php
namespace Controller;

// use models\Ville ;
// use models\Avocat ;
// $villeClass = new ville($connection);
// $avocatsSum = sizeof($avocatClass -> getAll("avocats"));
// $huissierSum = sizeof($huissierClass -> getAll("huissiers"));
// $top3 = $avocatClass -> top3();
// $allvilles = $villeClass -> getAll() ;
// include_once "./src/Views/Avocat-dashbord/dashbord-avocat.php";
use models\Avocat;
use models\Huissier ;
use Services\Database ;


use render\View;
class StatistiquesController{
  // public function checkUser($user){
  //   if($user)
  // }
  
  public static function Avocat(){
    $connection = Database::get_connection();
    $avocatClass = new Avocat($connection);
    $idAvocat = $avocatClass->getid();
    
    $totalClientsAvocat = $avocatClass->ClientsUnique();
    $taarifAvocat = $avocatClass->getTaarif($id=11);
    
    $lesHeuresAvocat = $avocatClass->TotalHeures($idAvocat);
    $ChiffreDaffaireAvocat = $avocatClass->ChiffreDaffaires($lesHeuresAvocat,$taarifAvocat);
    View::render("Avocat-dashbord/dashbord-avocat",["heures"=>$lesHeuresAvocat,
    "chiffreDaffaire"=>$ChiffreDaffaireAvocat,
    "ClientsUnique"=>$totalClientsAvocat]);
    
    }
    
    public static function Huissier(){
      $connection = Database::get_connection();
      $huissierClass = new Huissier($connection);
      $idHuissier = $huissierClass->getid();

    $totalClientsHuissier = $huissierClass->ClientsUnique();
   $taarifHuissier = $huissierClass->getTaarif($id=12);
  
  
    $lesHeuresHuissier = $huissierClass->TotalHeures($idHuissier);
    $ChiffreDaffaireHuissier = $huissierClass->ChiffreDaffaires($lesHeuresHuissier,$taarifHuissier);
      View::render("Huissier-dashbord/dashbord-huissier",["heures"=>$lesHeuresHuissier,
                                                     "chiffreDaffaire"=>$ChiffreDaffaireHuissier,
                                                     "ClientsUnique"=>$totalClientsHuissier]);
}
}

// StatistiquesController::Avocat();
// StatistiquesController::Huissier();



