<?php

namespace models;
use PDO;
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

    public function create($clientId, $proId)
    {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO demandes (status, client_id, professionel_id) 
                VALUES ('Pending', :client_id, :pro_id) 
                RETURNING id
            ");

            $stmt->execute([
                ':client_id' => $clientId,
                ':pro_id' => $proId
            ]);

            return $stmt->fetchColumn();
        } catch (\PDOException $e) {
            return false;
        }
    }
}
