<?php
use models\Professionel ;
use Services\Database ;
use models\Rendezvous ;
$databaseClass = new Database();
$RendezvousClass = new Rendezvous($databaseClass->get_connection());
$profitionelClass = new Professionel($databaseClass->get_connection());
$userId = $profitionelClass -> getId();
$allrendivous = $RendezvousClass -> RendezvousById($userId);
echo json_encode($allrendivous);
