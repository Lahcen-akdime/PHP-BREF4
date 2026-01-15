<?php
use models\Huissier ;
use Services\Database ;
use models\Ville ;
$connection = Database::get_connection();
$HuissierClass = new Huissier($connection) ;
$data = $HuissierClass -> getUser("huissier",$_GET['id']);
$villeClass = new ville($connection) ;
$allvilles = $villeClass -> getAll() ;
include_once "..\src\Views\Gestion\Formulaires\EditHuissier.php";
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'];
    $consultation_en_ligne = $_POST['consultation_en_ligne'];
    $Annes_dex = $_POST['Annes_dex'];
    $ville_id = $_POST['ville_id'];
    $id = $_POST['id'];
    $types_actes = $_POST['types_actes'];
  $HuissierClass->edit($id,$name,$consultation_en_ligne,$Annes_dex,$ville_id,$types_actes);
  echo '<script type="text/javascript">
           window.location = "huissier";
      </script>';
}