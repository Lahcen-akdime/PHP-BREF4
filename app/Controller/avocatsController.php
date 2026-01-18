<?php
namespace Controller;
use models\Avocat ;
use models\Ville ;
use Services\Database ;
$connection = Database::get_connection();
$avocatClass = new Avocat($connection);
$villeClass = new ville($connection);
$data = $avocatClass -> getAll("avocat");
$currentPage = $_GET['curruntPage'] ?? 1 ;
include_once "..\src\Views\Gestion\Roster\avocatsPage.php";