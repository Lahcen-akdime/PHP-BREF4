<?php
use models\Professionel ;
use Services\Database ;
$databaseClass = new Database();
$profitionelClass = new Professionel($databaseClass->get_connection());
$userId = $profitionelClass -> getId();
