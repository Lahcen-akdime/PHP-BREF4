<?php 
use Services\Database ;
use models\Huissier ;
use models\Ville ;
$connection = Database::get_connection();
$huissierClass = new Huissier($connection);
$villeClass = new ville($connection);
$data = $huissierClass -> getAll("huissier");
include_once "..\src\Views\Gestion\Roster\huissiersPage.php";