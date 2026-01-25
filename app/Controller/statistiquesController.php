<?php

namespace Controller;

use models\Avocat;
use models\Huissier;
use models\Professionel;
use Services\Database;


use render\View;

class StatistiquesController
{
  public static function checkUser()
  {

    if($_SESSION["role"]==="avocat"){
      header("location:Avocat");

      }
    else if($_SESSION["role"]==="huissier"){
        header("location:Huissier");

    }else if ($_SESSION["role"] === "admin") {
      header("location:Admin");
    }
  }

  public static function Avocat()
  {
    $connection = Database::get_connection();
    $avocatClass = new Avocat($connection);
    // $idAvocat = $avocatClass->getId();

    $totalClientsAvocat = $avocatClass->ClientsUnique();
    $taarifAvocat = $avocatClass->getTaarif();

    $lesHeuresAvocat = $avocatClass->TotalHeures();
    $ChiffreDaffaireAvocat = $avocatClass->ChiffreDaffaires($lesHeuresAvocat, $taarifAvocat);
    View::render("Avocat-dashbord/dashbord-avocat", [
      "heures" => $lesHeuresAvocat,
      "chiffreDaffaire" => $ChiffreDaffaireAvocat,
      "ClientsUnique" => $totalClientsAvocat
    ]);
  }

  public static function Huissier()
  {
    $connection = Database::get_connection();
    $huissierClass = new Huissier($connection);
    // $idHuissier = $huissierClass->getId();

    $totalClientsHuissier = $huissierClass->ClientsUnique();
    $taarifHuissier = $huissierClass->getTaarif();


    $lesHeuresHuissier = $huissierClass->TotalHeures();
    $ChiffreDaffaireHuissier = $huissierClass->ChiffreDaffaires($lesHeuresHuissier, $taarifHuissier);
    View::render("Huissier-dashbord/dashbord-huissier", [
      "heures" => $lesHeuresHuissier,
      "chiffreDaffaire" => $ChiffreDaffaireHuissier,
      "ClientsUnique" => $totalClientsHuissier
    ]);
  }


  public static function Admin()
  {
    $connection = Database::get_connection();
    $Pendings = Professionel::Pending($connection);
    $Accepteds = Professionel::Accepted($connection);
    $Rejecteds = Professionel::Rejected($connection);
    $LesDemandes = Professionel::LesDemandes($connection);

    View::render("Admin-dashbord/dashbord-admin", [
      "pending" => $Pendings,
      "accepted" => $Accepteds,
      "rejected" => $Rejecteds,
      "LesDemandes" => $LesDemandes
    ]);
  }

  // update status de user accepted
  public static function Update()
  {
    $connection = Database::get_connection();
    $id = $_GET['id'];
    
    if ($role = $_GET['role']) {
      Professionel::AdminConsulterAccepted($connection, $id, $role);

      $Pendings = Professionel::Pending($connection);
      $Accepteds = Professionel::Accepted($connection);
      $Rejecteds = Professionel::Rejected($connection);

      $LesDemandes = Professionel::LesDemandes($connection);


      View::render("Admin-dashbord/dashbord-admin", [
        "pending" => $Pendings,
        "accepted" => $Accepteds,
        "rejected" => $Rejecteds,
        "LesDemandes" => $LesDemandes
      ]);
    }
  }

  // update status de user rejected
  public static function Rejected()
  {
    $connection = Database::get_connection();
    $id = $_GET['id'];
    $role = $_GET['role'];
    if ($role) {
      Professionel::AdminConsulterRejected($connection, $id, $role);

      $Pendings = Professionel::Pending($connection);
      $Accepteds = Professionel::Accepted($connection);
      $Rejecteds = Professionel::Rejected($connection);

      $LesDemandes = Professionel::LesDemandes($connection);

      View::render("Admin-dashbord/dashbord-admin", [
        "pending" => $Pendings,
        "accepted" => $Accepteds,
        "rejected" => $Rejecteds,
        "LesDemandes" => $LesDemandes
      ]);
    }
  }
}


