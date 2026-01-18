<?php
namespace Controller;
use models\Avocat ;
use models\Ville ;
use Services\Database ;
$connection = Database::get_connection();
$avocatClass = new Avocat($connection);
$villeClass = new ville($connection);
$avocatsSum = sizeof($avocatClass -> getAll("avocat"));
$currentPage = $_GET['curruntPage'] ?? 1 ;
$nextPage = $currentPage + 1 ;
$previusPage = $currentPage - 1 ;
$data = $avocatClass -> displayByPage("avocat",$currentPage);
$cartesDisplayed = sizeof($data);
$nextCartes = sizeof($avocatClass -> displayByPage("avocat",$nextPage));
include_once "..\src\Views\Gestion\Roster\avocatsPage.php";