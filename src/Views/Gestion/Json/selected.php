<?php
use models\Avocat ;
use models\Huissier ;
use Services\Database;
use Services\PDO ;
$Database = new Database();
// ____________________________________ Avocats __________________________________________________ //
$avocatClass = new Avocat($Database::get_connection());
if(isset($_GET['search'])){
    $selected = $avocatClass -> search("avocat",$_GET['search']);
    echo json_encode($selected);
}
// if(isset($_GET['filter'])){

// }
// ____________________________________ Huissiers __________________________________________________ //
