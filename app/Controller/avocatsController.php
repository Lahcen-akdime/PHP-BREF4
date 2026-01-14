<?php
require_once "..\app\Services\Database.php";
require_once "..\app\models\avocat.php";
$connection = Database::get_connection();
$avocatClass = new Avocat($connection);
$data = $avocatClass -> getAll("avocat");
include_once "..\src\Views\Gestion\Roster\avocatsPage.php";