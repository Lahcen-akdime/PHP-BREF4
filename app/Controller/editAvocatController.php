<?php
use models\Avocat ;
use models\Ville ;
use Services\Database ;
$connection = Database::get_connection() ;
$avocatClass = new Avocat($connection) ;
$villeClass = new ville($connection) ;
$allvilles = $villeClass -> getAll() ;
$data = $avocatClass -> getUser("avocat",$_GET['id']) ;
include_once "..\src\Views\Gestion\Formulaires\EditAvocat.php" ;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'];
    $consultation_en_ligne = $_POST['consultation_en_ligne'];
    $Annes_dex = $_POST['Annes_dex'];
    $ville_id = $_POST['ville_id'];
    $specialite = $_POST['specialite'];
    $id = $_POST['id'];
  $avocatClass->edit($id,$name,$consultation_en_ligne,$Annes_dex,$ville_id,$specialite);
  echo '<script type="text/javascript">
           window.location = "huissier";
      </script>';
}