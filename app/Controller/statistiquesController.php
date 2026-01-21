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
$connection = Database::get_connection();

$avocatClass = new Avocat($connection);
$huissierClass = new Huissier($connection);

use render\View;
    $idAvocat = $avocatClass->getid();

    $totalClientsAvocat = $avocatClass->ClientsUnique();
    
    $lesHeuresAvocat = $avocatClass->TotalHeures($idAvocat);
    $ChiffreDaffaireAvocat = $avocatClass->ChiffreDaffaires($lesHeuresAvocat);
      View::render("Avocat-dashbord/dashbord-avocat",["heures"=>$lesHeuresAvocat,
                                                     "chiffreDaffaire"=>$ChiffreDaffaireAvocat,
                                                     "ClientsUnique"=>$totalClientsAvocat]);

    $idHuissier = $huissierClass->getid();

    $totalClientsHuissier = $huissierClass->ClientsUnique();

    $lesHeuresHuissier = $huissierClass->TotalHeures($idHuissier);
    $ChiffreDaffaireHuissier = $huissierClass->ChiffreDaffaires($lesHeuresHuissier);
      View::render("Huissier-dashbord/dashbord-huissier",["heures"=>$lesHeuresHuissier,
                                                     "chiffreDaffaire"=>$ChiffreDaffaireHuissier,
                                                     "ClientsUnique"=>$totalClientsHuissier]);

