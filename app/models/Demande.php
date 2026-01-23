<?php

namespace models;

use PDO;
use PDOException;

class Demande
{
    private PDO $db;
    private int $id;
    private int $client_id;
    private int $professionel_id;
    private string $status;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function find(int $id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * from demandes where client_id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (PDOException) {
            return false;
        }
    }
    public function findallPending()
    {
        try {
            $stmt = $this->db->prepare("SELECT d.*, u.name as client_name 
            FROM demandes d
            JOIN users u ON d.client_id = u.id
            WHERE d.status = 'Pending'");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException) {
            return false;
        }
    }

    public function create($clientId, $proId, $start_datetime, $end_datetime)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO demandes (status, client_id, professionel_id,date_debut,date_fin) 
                VALUES ('Pending', :client_id, :pro_id, :date_debut, :date_fin) 
                RETURNING id
            ");



            $stmt->execute([
                ':client_id' => $clientId,
                ':pro_id' => $proId,
                ':date_debut' => $start_datetime,
                ':date_fin' => $end_datetime
            ]);

            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function findById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM demandes WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function changeStatus($id, $status)
    {
        try {
            $stmt = $this->db->prepare("UPDATE demandes SET status = :status WHERE id = :id");
            $stmt->execute([':status' => $status, ':id' => $id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAcceptedByProfessional($proId)
    {
        try {
            $stmt = $this->db->prepare("SELECT date_debut, date_fin FROM demandes WHERE professionel_id = :proId AND status = 'Accepted'");
            $stmt->execute([':proId' => $proId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return [];
        }
    }
}
