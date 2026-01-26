<?php

namespace Controller;

use models\Professionel;
use models\Rendezvous;
use Services\Database;

class jsonController
{
    public function index()
    {
        header('Content-Type: application/json');

        $databaseClass = new Database();
        $db = $databaseClass->get_connection();

        // $profitionelClass = new Professionel($db);
        // $userId = $profitionelClass->getId(); // method returns null as object not hydrated 
        $userId = $_SESSION['user_id'] ?? null;

        // Check if user is logged in / has ID
        if (!$userId) {
            echo json_encode([]);
            return;
        }

        $RendezvousClass = new Rendezvous($db);
        $allrendivous = $RendezvousClass->RendezvousById($userId);

        echo json_encode($allrendivous);
    }
}