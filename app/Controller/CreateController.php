<?php
Use Services\Database ;
Use models\Huissier ;
Use models\Avocat ;
Use models\Ville ;
$connection = Database::get_connection();
$villeClass = new ville($connection);
$huissierClass = new Huissier($connection);
$AvocatClass = new Avocat($connection);

$allvilles = $villeClass -> getAll() ;
require_once "..\src\Views\Gestion\Formulaires\DinamicCreate.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $consultation_en_ligne = $_POST['consultation_en_ligne'];
    $Annes_dex = $_POST['Annes_dex'];
    $ville_id = $_POST['ville_id'];
    $specialite = $_POST['specialite'];
    $types_actes = $_POST['types_actes'];
    if(empty($_POST['specialite'])){
        // its a huissier user
    $types_actes = $_POST['types_actes'];
    $huissierClass -> create("huissier",'types_actes',$name,$types_actes,
                            $consultation_en_ligne,$Annes_dex,$ville_id);
    echo '<script type="text/javascript">
           window.location = "huissier";
      </script>';
    }
    else{
        // its avocat user
    $specialite = $_POST['specialite'];
    $AvocatClass -> create("avocat",'specialite',$name,$specialite,
                            $consultation_en_ligne,$Annes_dex,$ville_id);
       echo '<script type="text/javascript">
           window.location = "avocats";
      </script>';
    }
}