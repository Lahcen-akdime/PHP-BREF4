<?php
use models\Avocat ;
use Services\Database ;
$connection = Database::get_connection();
$avocatClass = new Avocat($connection);
$data = $avocatClass -> getAll("avocat");
include_once "..\src\Views\Gestion\Roster\avocatsPage.php";