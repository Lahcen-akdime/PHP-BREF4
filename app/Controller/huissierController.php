<?php 
require_once "..\app\Services\Database.php";
require_once "..\app\models\Huissier.php";
$connection = Database::get_connection();
$huissierClass = new Huissier($connection);
$data = $huissierClass -> getAll("huissier");
include_once "..\src\Views\Gestion\Roster\huissiersPage.php";