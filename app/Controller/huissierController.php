<?php 
use models\Huissier ;
use Services\Database ;
$connection = Database::get_connection();
$huissierClass = new Huissier($connection);
$data = $huissierClass -> getAll("huissier");
include_once "..\src\Views\Gestion\Roster\huissiersPage.php";