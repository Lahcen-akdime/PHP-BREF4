<?php 
use Services\Database ;
use models\Huissier ;
use models\Ville ;
$connection = Database::get_connection();
$huissierClass = new Huissier($connection);
$villeClass = new ville($connection);
$data = $huissierClass -> getAll("huissiers");
$currentPage = $_GET['curruntPage'] ?? 1 ;
$nextPage = $currentPage + 1 ;
$previusPage = $currentPage - 1 ;
$data = $huissierClass -> displayByPage("huissiers",$currentPage);
$cartesDisplayed = sizeof($data);
$nextCartes = sizeof($huissierClass -> displayByPage("huissiers",$nextPage));
include_once "..\src\Views\Gestion\Roster\huissiersPage.php";