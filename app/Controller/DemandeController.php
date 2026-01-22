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
    public function accept()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $demande_id = $input['demande_id'] ?? null;
            $status = $input['status'] ?? 'Accepted';
            $link = $input['link'] ?? null;
            $duration = $input['duration'] ?? 0;

            if (!$demande_id) {
                echo json_encode(['success' => false, 'message' => 'Missing demande_id']);
                return;
            }

            if ($status === 'Rejected') {
                $this->demandeModel->changeStatus($demande_id, 'Rejected');
                echo json_encode(['success' => true, 'message' => 'Demande Rejected']);
                return;
            }

            if (!$link) {
                echo json_encode(['success' => false, 'message' => 'Missing Link for Acceptance']);
                return;
            }

            $demande = $this->demandeModel->findById($demande_id);
            if (!$demande) {
                echo json_encode(['success' => false, 'message' => 'Demande not found']);
                return;
            }

            $rendezvousModel = new Rendezvous($this->db);

            $created = $rendezvousModel->create($demande_id, $link, $demande['date_debut'], $demande['date_fin'], $duration);

            if ($created) {
                $this->demandeModel->changeStatus($demande_id, 'Accepted');
                echo json_encode(['success' => true, 'message' => 'Rendezvous created and Demande accepted']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to create Rendezvous']);
            }
        }
    }
}

$controller = new DemandeController();
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'store') {
        $controller->store();
    } elseif ($_GET['action'] === 'accept') {
        $controller->accept();
    }
} else {
    $controller->index();
}
