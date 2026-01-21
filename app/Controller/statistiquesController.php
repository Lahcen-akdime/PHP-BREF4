<?php
namespace Controller;

// use models\Huissier ;
// use models\Ville ;
// use models\Avocat ;
// $huissierClass = new Huissier($connection);
// $villeClass = new ville($connection);
// $avocatsSum = sizeof($avocatClass -> getAll("avocats"));
// $huissierSum = sizeof($huissierClass -> getAll("huissiers"));
// $top3 = $avocatClass -> top3();
// $allvilles = $villeClass -> getAll() ;
// include_once "./src/Views/Avocat-dashbord/dashbord-avocat.php";
use models\Avocat;
use Services\Database ;
$connection = Database::get_connection();
$avocatClass = new Avocat($connection);

use render\View;
    $id = $avocatClass -> getid();
    
      $lesHeures = $avocatClass->TotalHeures($id);
      View::render("Avocat-dashbord/dashbord-avocat",["heures"=>$lesHeures]);



