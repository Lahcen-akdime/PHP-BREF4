<?php

namespace Controller;

use models\Demande;
use models\Rendezvous;
use render\View;
use Services\Database;

class DemandeController
{
    private $demandeModel;
    private $db;

    public function __construct()
    {
        $this->db = Database::get_connection();
        $this->demandeModel = new Demande($this->db);
    }

    public function index()
    {
        $data = $this->demandeModel->findallPending();
        View::render("Professionel/demandes/index", ["demandes" => $data]);
    }

    public function store()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);

            $id_client = $input['client_id'] ?? null;
            $id_professionel = $input['professionel_id'] ?? null;
            $start_datetime = $input['start_datetime'] ?? null;
            $end_datetime = $input['end_datetime'] ?? null;

            if (!$id_client || !$id_professionel) {
                echo json_encode(['success' => false, 'message' => 'Missing fields']);
                return;
            }

            $result = $this->demandeModel->create($id_client, $id_professionel, $start_datetime, $end_datetime);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Demande Created', 'id' => $result]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Database Error']);
            }
        }
    }
   
}

$controller = new DemandeController();
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'store') {
        $controller->store();
    }
} else {
    $controller->index();
}
