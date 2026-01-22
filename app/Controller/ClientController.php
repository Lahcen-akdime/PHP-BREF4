<?php

namespace Controller;

use models\Client;
use models\Demande;
use models\Ville;
use Services\Database;
use render\View;

class ClientController
{
    private $db;
    private $clientModel;
    private $villeModel;
    private $demandeModel;

    public function __construct()
    {
        $this->db = Database::get_connection();
        $this->clientModel = new Client($this->db);
        $this->villeModel = new Ville($this->db);
        $this->demandeModel = new Demande($this->db);
    }

    public function index()
    {
        $villes = $this->villeModel->getAll();

        View::render('Client/Search/search', [
            'villes' => $villes
        ]);
    }

    public function demandes()
    {
        $data = $this->demandeModel->find(1);
    }

    public function search()
    {
        if (isset($_GET['action']) && $_GET['action'] === 'search') {
            header('Content-Type: application/json');

            $role = $_GET['role'] ?? 'avocat';
            $criteria = [
                'keyword' => $_GET['search'] ?? '',
                'ville' => $_GET['ville'] ?? '',
                'specialite' => $_GET['specialite'] ?? ''
            ];

            try {
                $results = $this->clientModel->searchProfessionals($role, $criteria);
                echo json_encode($results);
            } catch (\Exception $e) {
                http_response_code(500);
                echo json_encode(['error' => $e->getMessage()]);
            }
            exit;
        }

        $this->index();
    }
    public function getAvailability()
    {

        header("Content-Type: application/json");
        $id = $_GET['id'] ?? null;
        if ($id) {
            $data = $this->clientModel->getProfessionalById($id);
            if ($data) {
                echo json_encode($data['disponibilite']);
            }
        }
    }
}
