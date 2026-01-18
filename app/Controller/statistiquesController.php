<?php
use models\Huissier ;
use models\Ville ;
use models\Avocat ;
use Services\Database ;
$connection = Database::get_connection();
$huissierClass = new Huissier($connection);
$avocatClass = new Avocat($connection);
$villeClass = new ville($connection);
$avocatsSum = sizeof($avocatClass -> getAll("avocat"));
$huissierSum = sizeof($huissierClass -> getAll("huissier"));
$top3 = $avocatClass -> top3();
$allvilles = $villeClass -> getAll() ;
include_once "..\src\Views\Statistiques\statistiques.php";