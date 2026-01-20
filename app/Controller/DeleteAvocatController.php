<?php
use models\Avocat ;
Use Services\Database ;
$connection = Database::get_connection();
$avocatClass = new Avocat($connection) ;
$avocatClass -> delete("avocats",$_GET['id']);
header("location:avocats");