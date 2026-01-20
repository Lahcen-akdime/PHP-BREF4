<?php
use models\Huissier ;
Use Services\Database ;
$connection = Database::get_connection();
$HuissierClass = new Huissier($connection) ;
$HuissierClass -> delete("Huissiers",$_GET['id']);
header("location:huissier");