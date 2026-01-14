<?php
use models\Avocat ;
use Services\Database ;
use models\Ville ;
$connection = Database::get_connection();
$avocatClass = new Avocat($connection);
$villeClass = new ville($connection);
$data = $avocatClass -> getAll("avocat");
include_once "..\src\Views\Gestion\Roster\avocatsPage.php";